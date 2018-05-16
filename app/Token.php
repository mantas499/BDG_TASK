<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $fillable = ['id', 'symbol', 'name', 'homepage', 'total_supply', 'current_price', 'created_at', 'updated_at'];
}
