<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildHealth extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function childrens(){
        return $this->belongsTo(Children::class, 'children_id');
    }

    public function diseases(){
        return $this->belongsTo(Disease::class, 'disease_id');
    }
}
