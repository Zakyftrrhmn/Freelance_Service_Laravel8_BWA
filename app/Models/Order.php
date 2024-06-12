<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Order extends Model
{
    // use HasFactory;
    use softDeletes;

    public $table = 'order';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'service_id',
        'buyer_id',
        'freelance_id',
        'file',
        'note',
        'expired',
        'order_status_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function service(){
        return $this->belongsTo('App\Models\Service','service_id','id');
    }
    public function user_buyer(){
        return $this->belongsTo('App\Models\User', 'buyer_id', 'id');
    }
    public function user_freelance(){
        return $this->belongsTo('App\Models\User', 'freelance_id', 'id');
    }
    public function order_status(){
        return $this->belongsTo('App\Models\OrderStatus', 'order_status_id', 'id');
    }
}
