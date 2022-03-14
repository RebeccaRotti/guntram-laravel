<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;

    protected $table = 'states';
    protected $fillable = [
        'state' // string 45
    ];

    public function projects() {
        return $this->hasMany(Projects::class, 'state_id');
    }
}
