<x-layout>
    <section class="container-page py-16 sm:py-24">
        <div class="mx-auto max-w-2xl text-center"> 
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

    </section>
</x-layout>
