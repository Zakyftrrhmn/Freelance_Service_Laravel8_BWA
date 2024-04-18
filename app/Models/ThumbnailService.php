<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class ThumbnailService extends Model
{
    // use HasFactory;
    use softDeletes;

    public $table = 'thumbnail_service';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'service_id',
        'thumbnail',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function service(){
        return $table->belongsTo('App\Models\Service','service_id','id');
    }

}
