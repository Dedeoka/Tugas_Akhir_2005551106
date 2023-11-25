<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCost extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function childCostDetails()
    {
        return $this->hasMany(ChildCostDetail::class);
    }
}
