<?php

namespace Invoice;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderites(){
        return $this->hasMany('App\OrderItem', 'order_item_id', 'id');
    }
}
