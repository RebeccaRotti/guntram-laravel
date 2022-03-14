<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $fillable = [
        'title', // string 150
        'description', // text
        'releasedate', // date
        // state_id foreign
        // company_id foreign
    ];

    public function state() {
        return $this->belongsTo(States::class,  'state_id', 'id');
    }

    public function company() {
        return $this->belongsTo(Companies::class, 'company_id',  'id');
    }
}
