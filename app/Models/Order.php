<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\OrderDetail;

class Order extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_serial', 'type', 'user_id', 'address_id', 'total', 'fee', 'grand_total'];

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
