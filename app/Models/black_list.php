<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class black_list extends Model
{
    protected $fillable = ['name','id_event','date_start','price_end',];
    protected $table = 'black_lists';
    public function event()
   {
    return $this->belongsTo(event::class,'id_event');
   }
}
