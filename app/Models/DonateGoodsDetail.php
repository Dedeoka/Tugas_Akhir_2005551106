<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonateGoodsDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function donateGoods(){
        return $this->belongsTo(DonateGoods::class, 'donate_goods_id');
    }

    public function goodsCategory(){
        return $this->belongsTo(GoodsCategory::class, 'goods_category_id');
    }
}
