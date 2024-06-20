<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonaturEventImages extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function donaturEvent(){
        return $this->belongsTo(DonaturEvent::class, 'donatur_event_id');
    }
}
