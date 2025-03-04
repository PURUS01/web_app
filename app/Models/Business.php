<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Business extends Model
{
    use HasFactory;
    protected $fillable=['name','created_by'];

    public function user():HasMany
    {
        return $this->hasMany(User::class);
    }
}
