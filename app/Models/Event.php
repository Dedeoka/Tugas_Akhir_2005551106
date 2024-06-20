<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function eventImages()
    {
        return $this->hasMany(EventImages::class);
    }

    public function eventType(){
        return $this->belongsTo(EventType::class, 'event_type_id');
    }
}
