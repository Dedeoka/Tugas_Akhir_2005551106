<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function childHealths()
    {
        return $this->hasMany(ChildHealth::class);
    }

    public function childEducations()
    {
        return $this->hasMany(ChildEducation::class);
    }

    public function childAchievement()
    {
        return $this->hasMany(ChildAchievement::class);
    }
}
