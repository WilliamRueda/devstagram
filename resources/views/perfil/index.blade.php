@extends('layauts.app')


@section('titulo')
    Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center mt-10 ">
        <div class="md:w-1/2 bg-white shadow p-6">
           <form action="{{route('perfil.store',auth()->user())}}" method="POST" class="mt-10 md:mt-0" enctype="multipart/form-data">
            @csrf
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
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                <input id="email" name="email" placeholder="Tu email" class="border p-3 w-full rounded-lg   @error('email') border-red-500  @enderror "
                value="{{auth()->user()->email}}"   
                type="email" >
                    @error('email') 
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
            </div>
            <div class="mb-5">
                <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen Perfil</label>
                <input id="imagen" name="imagen" class="border p-3 w-full rounded-lg "
                value=""   
                type="file" 
                accept=".jpg, .jpeg, .png"
                >
                 
            </div>
            <div class="mb-5">
                <label for="oldPassword" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña Actual</label>
                <input id="oldPassword" name="oldPassword" placeholder="Digita tu password Actual" class="border p-3 w-full rounded-lg   @error('oldPassword') border-red-500  @enderror "
                type="password" >
                    @error('oldPassword') 
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
            </div>
            <div class="mb-5">
                <label for="newPassword" class="mb-2 block uppercase text-gray-500 font-bold">Nueva Contraseña</label>
                <input id="newPassword" name="newPassword" placeholder="Nueva contraseña" class="border p-3 w-full rounded-lg   @error('newPassword') border-red-500  @enderror "
                value=""   
                type="password" >
                    @error('newPassword') 
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
            </div>
            <div class="mb-5">
                <label for="rnewPassword" class="mb-2 block uppercase text-gray-500 font-bold">Repite la nueva contraseña</label>
                <input id="rnewPassword" name="rnewPassword" placeholder="Repite la nueva contraseña" class="border p-3 w-full rounded-lg   @error('rnewPassword') border-red-500  @enderror "
                value=""   
                type="password" >
                    @error('rnewPassword') 
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
            </div>
            <input type="submit" value="Guardar Cambios"
            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg  ">
        </form> 

      

    </div>
@endsection