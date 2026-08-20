<x-layout>
        <section class="flex flex-col gap-2 items-center justify-center border-2 border-gray-200 rounded-xl p-4">

    <h1 class="text-5xl font-bold underline">Welcome to register page</h1>

    <form action="{{ route("auth.register") }}" method="POST" class="flex flex-col gap-2">
        @csrf
        <label for="name" class="text-black font-semibold">Name</label>
        <input type="text" class="text-black border-2 border-gray-200 rounded-xl p-2" placeholder="Seu nome" name="name" id="name">
        @error('name')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
        <label for="email" class="text-black font-semibold">Email</label>
        <input type="email" class="text-black border-2 border-gray-200 rounded-xl p-2" placeholder="Seu email" name="email" id="email">
        @error('email')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
        <label for="password" class="text-black font-semibold">Password</label>
        <input type="password" class="text-black border-2 border-gray-200 rounded-xl p-2" placeholder="Sua senha" name="password" id="password">
        @error('password')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
        <label for="password_confirmation" class="text-black font-semibold">Confirmar Senha</label>
        <input type="password" class="text-black border-2 border-gray-200 rounded-xl p-2" placeholder="Confirme sua senha" name="password_confirmation" id="password_confirmation">
        @error('password_confirmation')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">Register</button>
    </form>

        <p class="text-center">
        Já tem uma conta? <a href="{{ route('login') }}" class="font-semibold underline hover:opacity-50 transition-all duration-200">Faça login</a>
    </p>
    </section>
</x-layout>