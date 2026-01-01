<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    protected $fillable = ['name','quty','price','user_id','id_event'];
    protected $table = 'tickets';
   public function event()
   {
    return $this->belongsTo(event::class,'id_event');
   }
   public function user()
   {
    return $this->belongsTo(User::class,'user_id');
   }
}
