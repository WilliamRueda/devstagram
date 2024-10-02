<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function __construct()
    {
     $this->middleware('auth');    
    }
    public function index(User $user){
         
      $posts = Post::where('user_id', $user->id)->paginate(8);
    
      return view('dashboard', ['user' => $user, 'posts' => $posts]);
    }

  

    public function create(){
      return view('post.create');
    }

    public function store(Request $request){
      $this->validate($request,[
        'titulo' => 'required',
        'description' => 'required',
        'image' => 'required'
      ]);
      /* Post::create([
        'titulo' => $request->titulo,
        'description' => $request->description,
        'image' => $request->image,
        'user_id' => auth()->user()->id
      ]); */
      
      /* OTRA FORMA DE REALIZAR REGISTROS */

     /*  $post = new Post;
      $post->titulo = $request->titulo;
      $post->description = $request->description;
      $post->image = $request->image;
      $post->user_id = auth()->user()->id;
      $post->save();
       */

      /* Crear usuario usando la directriz de la relacion */

      $request->user()->posts()->create([
        'titulo' => $request->titulo,
        'description' => $request->description,
        'image' => $request->image,
        'user_id' => auth()->user()->id

      ]);
      return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user ,Post $post){
      return view('post.show',['post' => $post]);
    }

    }
    
