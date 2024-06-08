<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class OrderStatus extends Model
{
    // use HasFactory;
    use softDeletes;

    public $table = 'order_status';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function order(){
        return $this->hasMany('App\Models\Order','order_status_id');
    }
}
