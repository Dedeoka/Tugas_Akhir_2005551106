<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostType extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function costs()
    {
        return $this->hasMany(Cost::class);
    }
}
