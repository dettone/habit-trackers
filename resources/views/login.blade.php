<x-layout>
    <h1 class="
        text-5xl 
        font-bold 
        underline"
    >
        Welcome to login page!
    </h1>

    <form action="{{ route('login.auth') }}" method="POST" class="flex flex-col gap-2">
        @csrf
        <label for="email" class="text-black">Email</label>
        <input type="email"  class="text-black"  name="email" id="email" placeholder="email">
        <label for="password" class="text-black">Password</label>
        <input type="password" class="text-black" name="password" placeholder="password" id="password">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer" >Login</button>
    </form>

    <div>
        @error('email')
            <p class="text-red-500" >{{ $message }}</p>
        @enderror
    </div>
</x-layout>