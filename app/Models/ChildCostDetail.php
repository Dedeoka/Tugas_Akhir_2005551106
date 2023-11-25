<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCostDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function childCosts(){
        return $this->belongsTo(ChildCost::class, 'child_cost_id');
    }
}
