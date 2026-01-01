<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $fillable = ['name','description','date_start','date_end','place','id_tick','qty_tick','image',];
    protected $table = 'events';
    public function Tickets()
    {
        return $this->hasMany(ticket::class);
    }
    public function black_list()
    {
        return $this->hasOne(black_list::class);
    }
}
