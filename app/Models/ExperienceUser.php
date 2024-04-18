<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class ExperienceUser extends Model
{
    // use HasFactory;
    use softDeletes;

    public $table = 'experience_user';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'detail_user_id',
        'experience',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function detail_user(){
        return $table->belongsTo('App\Models\Service','detail_user_id','id');
    }
}
