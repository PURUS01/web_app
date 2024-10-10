<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Business;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class userController extends Controller
{

    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
            $user = Auth::user();
            $role=Role::find($user->role_id);

            if($role->role_type=='super_admin'){

                return redirect()->route('dashboard');
            }
        }
        else{
            return "invalid credentials";
        }
    }



    public function dashboard(){

        $user=Auth::user();

        return view('user.dashboard' , compact('user'));
    }


    public function add_user(){
        $user=Auth::user();
        $role=Role::all();

        return view('user.add_user',compact('user','role'));
    }



    public function create_user(Request $request){
        $validated=Validator::make($request->all(),[

            'business_name'=>'required',
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5',
        ]);

        if($validated->fails()){
            return back();
        }
        $business=Business::create([
            'name'=>$request->input('business_name'),
            'created_by'=>Auth::id(),
        ]);
        $id=$business->id;

        if($business){
            $user=User::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=>Hash::make($request->input('password')),
                'created_by'=>Auth::id(),
                'business_id'=>$id,

            ]);
            if($user){
                return redirect()->route('dashboard');
            }
        }

    }


    public function dataTable(){
        return DataTables::of(User::with('business')->where('role_id',2)->get())
            ->addColumn('business_name', function(User $user) {
                return $user->business ? $user->business->name : 'N/A'; // Adjust according to your business table column
            })
            ->make(true);
    }

    public function add_role(){
        $user=Auth::user();
        return view('user.add_role',compact('user'));
    }


    public function new_role(Request $request){
       $validated= Validator::make($request->all(),[
            'role_name'=>'required',
        ]);
       if($validated->fails()){
           return back();
       }
       $role=Role::create([
           'role_type'=>$request->input('role_name'),
       ]);
       if($role){
           return redirect()->route('dashboard');
       }
    }
}
