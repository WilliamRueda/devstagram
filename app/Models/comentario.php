<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'comentarios'
    ];

    public function user(){
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }

}
