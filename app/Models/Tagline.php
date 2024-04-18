<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Tagline extends Model
{
    // use HasFactory;
    use softDeletes;

    public $table = 'tagline';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'service_id',
        'tagline',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function service(){
        return $table->belongsTo('App\Models\Service','service_id','id');
    }
}
