<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function childEducations()
    {
        return $this->hasMany(ChildEducation::class);
    }
}
