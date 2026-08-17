<header class="flex justify-between p-4 border-b border-2">
    Este e o header do meu site!

    @auth
        <form action="{{ route('logout') }}" class="inline cursor-pointer border-2 border-red-500 rounded px-2 py-1" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @endauth 


    @guest
        <a href="{{ route('login.auth') }}">Login</a>
    @endguest
</header>