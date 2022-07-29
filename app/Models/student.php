<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable = array('name','school_id','order');
    public function school()
    {
        return $this->belongsTo(school::class);
    }

}
