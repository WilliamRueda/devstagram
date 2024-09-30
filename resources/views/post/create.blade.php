@extends('layauts.app')

@section('titulo')
Crea una nueva publicacion
@endsection

@section('contenido')
<div class="md:flex md:items-center mt-10">
    <div class="md:w-1/2 px-10">
        imagen aqui
    </div>
    <div class=" px-10 md:w-1/2 bg-white p-6 rounded-lg shadow-xl mt-10 md:mt-0">
        <form action="{{route('register')}}" method="POST" novalidate >
            @csrf 
            <div class="mb-5">
                <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Titulo de tu post</label>
                <input id="titulo" name="titulo" placeholder="Titulo" class="border p-3 w-full rounded-lg   @error('name') border-red-500  @enderror "
                value="{{old('titulo')}}"   
                type="text" >
                    @error('titulo')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
            </div>
            <div class="mb-5">
                <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripción de tu post</label>
                <textarea 
                 id="descripcion"
                 name="descripcion" 
                 placeholder="Drescripcion del Post"
                 class="border p-3 w-full rounded-lg 
                 @error('name') border-red-500  @enderror "
                
               >{{old('descripcion')}}</textarea>
                    @error('descripcion')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
            </div>

        </form>
    </div>
</div>
@endsection