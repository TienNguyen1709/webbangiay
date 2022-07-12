<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'name', 'email', 'password','phone'
    ];
    protected $primaryKey = 'id';
    protected $table = 'users';
}
