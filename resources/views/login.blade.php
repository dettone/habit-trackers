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
        <input type="email"  class="text-black @error('email') border-2 border-red-500 @enderror"   name="email" id="email" placeholder="seuemail@provedor.com">
        @error('email')
            <p class="text-red-500" >{{ $message }}</p>
        @enderror
        <label for="password" class="text-black ">Password</label>
        <input type="password" class="text-black @error('password') border-2 border-red-500 @enderror" name="password" placeholder="password" id="password">
        @error('password')
            <p class="text-red-500" >{{ $message }}</p>
        @enderror
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer" >Login</button>
    </form>
</x-layout>