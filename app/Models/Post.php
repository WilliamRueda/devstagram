<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    use HasFactory;

    protected $fillable =[
        'titulo',
        'description',
        'image',
        'user_id'

    ];

    public function user(){
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }
}
