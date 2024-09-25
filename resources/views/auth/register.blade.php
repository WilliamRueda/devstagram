@extends('layauts.app')

@section('titulo')
    Registrate en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center mt-9">
        <div class="md:w-6/12 ">
            <img src="{{ asset('img/registrar.jpg') }}" alt="">
        </div>
        <div class="md:w-1/2 bg-white p-6 rounded-lg shadow-xl ">
            <form action="">
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input id="name" name="name" placeholder="tu nombre" class="border p-3 w-full rounded-lg  "
                        type="text">
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input id="username" name="username" placeholder="Tu nombre de Usuario"
                        class="border p-3 w-full rounded-lg  " type="text">
                </div>
                <div class="mb-5">
                    <label for="Email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input id="email" name="email" placeholder="Tu Corre de registro"
                        class="border p-3 w-full rounded-lg  " type="email">
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input id="password" name="password" placeholder="Digita tu password"
                        class="border p-3 w-full rounded-lg  " type="password">

                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir
                        Password</label>
                    <input id="password_confirmation" name="password_confirmation" placeholder="Digita de nuevo tu password"
                        class="border p-3 w-full rounded-lg  " type="password">

                </div>

                <input type="submit" value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg  ">
            </form>

        </div>

    </div>
@endsection
