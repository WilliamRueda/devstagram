<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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

      /* Guardar cambios */
      $usuario = User::find(auth()->user()->id);
      $usuario->username = $request->username;
      $usuario->image= $nombreImagen ?? '';

      $usuario->save();

      //Redireccionamos al user
      return redirect()->route('posts.index', $usuario->username);
    }
}
