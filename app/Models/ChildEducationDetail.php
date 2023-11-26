<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildEducationDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function childEducation(){
        return $this->belongsTo(ChildEducation::class, 'child_education_id');
    }
}
