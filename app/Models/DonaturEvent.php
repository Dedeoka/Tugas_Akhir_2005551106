<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonaturEvent extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function donaturEventImages()
    {
        return $this->hasMany(DonaturEventImages::class);
    }

    public function eventType(){
        return $this->belongsTo(EventType::class, 'event_type_id');
    }
}
