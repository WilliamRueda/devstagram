<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;

class PerfilController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }              
    //
    public function index(){
        return view('perfil.index');
    }


    public function store(Request $request){
    
      $this->validate($request, [
        'username' => ['required','unique:users,username,' . auth()->user()->id,'min:3','max:20', 'not_in:editar-perfil', ],
        'email' => ['required', 'unique:users,email,' . auth()->user()->id,'min:8', 'max:30']
        
      ]);

      if($request->imagen){
       // 1. Recoger el archivo subido desde el formulario.
    $imagen = $request->file('imagen');
   
    // 2. Generar un nombre único para la imagen usando UUID.
    $nombreImagen = Str::uuid() . "." . $imagen->extension();

    // 3. Instanciar ImageManager con GD como driver.
    $manager = new ImageManager(['driver' => 'gd']);

    // 4. Crear una instancia de la imagen usando el archivo cargado.
    $image = $manager->make($imagen->getRealPath());
    $image->fit(1000, 1000);
    // 5. Definir la ruta donde se guardará la imagen.
    $imagenPath = public_path('perfiles') . '/' . $nombreImagen;

    // 6. Guardar la imagen en la ruta especificada.
    $image->save($imagenPath);
      }
   

      if (Hash::check($request->oldPassword, auth()->user()->password)) {
        dd("si esta bien la clave");
       }else{
       dd($request->email);
       }



      /* Guardar cambios */
      $usuario = User::find(auth()->user()->id);
      $usuario->username = $request->username;
      $usuario->image= $nombreImagen ?? auth()->user()->image ?? null;

      $usuario->save();
      
      //Redireccionamos al user
      return redirect()->route('posts.index', $usuario->username);
    }


}
