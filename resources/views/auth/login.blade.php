@extends('layauts.app')

@section('titulo')
    Inicia Sesión en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center mt-9">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="">
        </div>
        <div class="md:w-1/2 bg-white p-6 rounded-lg shadow-xl ">
            <form action="{{ route('login') }}" method="POST" novalidate>
                @csrf
                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
                @endif

                <div class="mb-5">
                    <label for="Email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input id="email" name="email" placeholder="Tu Corre de registro"
                        class="border p-3 w-full rounded-lg   @error('email') border-red-500  @enderror"
                        value="{{ old('email') }}"type="email">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input id="password" name="password" placeholder="Digita tu password"
                        class="border p-3 w-full rounded-lg   @error('password') border-red-500  @enderror" type="password">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="checkbox" name="remember" ><label  class="uppercase text-gray-500 font-bold" for=""> Mantener mi Sesión abierta</label> 
                </div>


                <input type="submit" value="Iniciar Sesión"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg  ">
            </form>

        </div>

    </div>
@endsection
