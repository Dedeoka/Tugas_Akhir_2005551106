<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function event()
    {
        return $this->hasMany(EventType::class);
    }
    
    public function donaturEvent()
    {
        return $this->hasMany(DonaturEvent::class);
    }
}
