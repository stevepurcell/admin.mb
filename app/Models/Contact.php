<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'type_id',
        'name',
        'address',
        'city',
        'state',
        'zipcode',
        'phone',
        'email',
        'contact',
        'notes',
    ];
}
