<x-layout>
    <section class="container-page py-16 sm:py-24">
        <div class="mx-auto max-w-2xl text-center">
            <span class="badge">Ola, {{ $name }}</span>

            <h1 class="mt-6 text-4xl font-bold tracking-tight sm:text-6xl">
                Welcome to {{ config('app.name') }}
            </h1>

            <p class="mt-5 text-lg text-slate-600">
                Crie seus habitos, marque o que concluiu no dia e acompanhe sua sequencia sem complicacao.
            </p>

            <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
                @auth
                    <a href="{{ route('site.dashboard') }}" class="btn btn-primary btn-lg">Ir para o dashboard</a>
                @endauth

                @guest
                    <a href="{{ route('site.register') }}" class="btn btn-primary btn-lg">Comecar agora</a>
                    <a href="{{ route('login') }}" class="btn btn-secondary btn-lg">Ja tenho conta</a>
                @endguest
            </div>
        </div>

        <ul class="mx-auto mt-16 grid max-w-3xl gap-4 sm:grid-cols-3">
            @foreach ($habits as $habit)
                <li class="card flex items-center gap-3 transition-shadow hover:shadow-md">
                    <span class="grid size-9 shrink-0 place-items-center rounded-full bg-emerald-50 text-emerald-600">
                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m5 13 4 4L19 7" />
                        </svg>
                    </span>
                    <span class="font-medium">{{ $habit }}</span>
                </li>
            @endforeach
        </ul>
    </section>
</x-layout>
