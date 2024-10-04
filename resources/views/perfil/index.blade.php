@extends('layauts.app')


@section('titulo')
    Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center mt-10 ">
        <div class="md:w-1/2 bg-white shadow p-6">
           <form action="" class="mt-10 md:mt-0">
            
            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                <input id="username" name="username" placeholder="tu nombre" class="border p-3 w-full rounded-lg   @error('username') border-red-500  @enderror "
                value="{{auth()->user()->username}}"   
                type="text" >
                    @error('username') 
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
            </div>
            <div class="mb-5">
                <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen Perfil</label>
                <input id="imagen" name="imagen" placeholder="tu nombre" class="border p-3 w-full rounded-lg   @error('username') border-red-500  @enderror "
                value="{{auth()->user()->username}}"   
                type="file" >
                    @error('imagen')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
            </div>
        </form> 

      

    </div>
@endsection