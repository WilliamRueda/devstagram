<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
class ImagenController extends Controller
{
    //
public function store(Request $request){
    // 1. Recoger el archivo subido desde el formulario.
    $imagen = $request->file('file');

    // 2. Generar un nombre único para la imagen usando UUID.
    $nombreImagen = Str::uuid() . "." . $imagen->extension();

    // 3. Instanciar ImageManager con GD como driver.
    $manager = new ImageManager(['driver' => 'gd']);

    // 4. Crear una instancia de la imagen usando el archivo cargado.
    $image = $manager->make($imagen->getRealPath());
    $image->fit(1000, 1000);
    // 5. Definir la ruta donde se guardará la imagen.
    $imagenPath = public_path('uploads') . '/' . $nombreImagen;

    // 6. Guardar la imagen en la ruta especificada.
    $image->save($imagenPath);

    // 7. Retornar una respuesta (opcional, ajusta según lo que necesites).
    return response()->json(['message' => 'Imagen guardada correctamente', 'path' => $imagenPath, 'image'=> $nombreImagen ]);
}

}
