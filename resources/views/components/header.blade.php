<header class="sticky top-0 z-40 border-b border-slate-200 bg-white/80 backdrop-blur">
    <div class="container-page flex h-16 items-center justify-between gap-4">
        <a href="{{ route('site.index') }}"
           class="flex items-center gap-2.5 rounded-lg transition-opacity hover:opacity-80">
            <span class="grid size-9 place-items-center rounded-xl bg-brand-600 text-white shadow-sm">
                <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="m5 13 4 4L19 7" />
                </svg>
            </span>
            <span class="text-base font-semibold tracking-tight">{{ config('app.name') }}</span>
        </a>

        <nav class="flex items-center gap-2">
            @auth
                <a href="{{ route('site.dashboard') }}" class="btn btn-ghost">Dashboard</a>

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Sair</button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="btn btn-ghost">Login</a>
                <a href="{{ route('site.register') }}" class="btn btn-primary">Criar conta</a>
            @endguest
        </nav>
    </div>
</header>
