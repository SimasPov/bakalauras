<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'ship_name', 'ship_surname', 'ship_address', 'email', 'post_code', 'total_price', 'order_status', 'session_id'];

    public function user() {

        return $this->belongsTo(User::class);
    }
}
