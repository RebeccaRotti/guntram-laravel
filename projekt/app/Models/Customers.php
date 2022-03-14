<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $fillable = [
        'forename',  // string 150
        'lastname', // string 150
        'email', // string 150
        'function', // string 150
        'note' // text
        // companies_id foreign
    ];
}
