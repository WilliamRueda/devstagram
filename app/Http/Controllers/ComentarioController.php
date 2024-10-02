<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //

    public function store(Request $request,User $user, Post $post){
       $this->validate($request,[
        'comentario'=> 'required|max:255',
       ]);

       /* Almacenar el comentario */

       comentario:: create([
        'user_id' => auth()->user()->id,
        'post_id' => $post->id,
        'comentarios' => $request->comentario

       ]);

       return back()->with('mensaje', 'Comentario Realizado Correctamene');


    }
   
}
