<?php

namespace Invoice;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public function orders(){
        return $this->belongsTo('App\Order', 'order_item_id', 'id');
    }
}
