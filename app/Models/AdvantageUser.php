<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class AdvantageUser extends Model
{
    // use HasFactory;
    use softDeletes;

    public $table = 'advantage_user';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'service_id',
        'advantage',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function service(){
        return $this->belongsTo('App\Models\Service','service_id','id');
    }
}
