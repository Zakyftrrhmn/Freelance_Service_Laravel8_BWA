<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class DetailUser extends Model
{
    // use HasFactory;
    use softDeletes;

    public $table = 'detail_user';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'photo',
        'role',
        'contact_number',
        'biography',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user(){
        return $table->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function experience_user(){
        return $table->hasMany('App\Models\ExperienceUser','detail_user_id');
    }
}
