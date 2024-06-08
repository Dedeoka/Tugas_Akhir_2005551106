<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function donateGoodDetails()
    {
        return $this->hasMany(DonateGoodsDetail::class);
    }
}
