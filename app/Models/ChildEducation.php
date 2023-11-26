<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildEducation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function childrens(){
        return $this->belongsTo(Children::class, 'children_id');
    }

    public function childAcademicAchievements()
    {
        return $this->hasMany(ChildAcademicAchievement::class);
    }

    public function childEducationDetails()
    {
        return $this->hasMany(ChildEducationDetail::class);
    }
}
