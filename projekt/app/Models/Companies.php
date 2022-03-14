<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = [
        'companyname', // string 150 required
        'address', // string 255 nullable
        'note' // Text nullable
    ];

    public function customers() {
        return $this->hasMany(Customers::class, 'company_id', 'id');
    }
}
