<x-layout>
    <section class="container-page py-10 sm:py-14">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h1 class="text-3xl font-bold tracking-tight sm:text-4xl">Dashboard</h1>
                <p class="mt-2 text-slate-600">
                    Bem-vindo de volta, {{ auth()->user()->name }}. Aqui voce acompanha seus habitos do dia.
                </p>
            </div>

            <button type="button" class="btn btn-primary self-start sm:self-auto">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M12 5v14M5 12h14" />
                </svg>
                Novo habito
            </button>
        </div>
        





        <div class="card mt-8 flex flex-col items-center gap-3 py-12 text-center">
            <span class="grid size-12 place-items-center rounded-full bg-brand-50 text-brand-600">
                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="3" y="4" width="18" height="18" rx="2" />
                    <path d="M16 2v4M8 2v4M3 10h18" />
                </svg>
            </span>

               
        @forelse ($habits as $habit)
            <h2 class="text-lg font-semibold">{{ $habit->name }}</h2>
            <p class="text-sm text-slate-600">
                @if ($habit->habitLogs->isEmpty())
                    Nenhum registro ainda.
                @else
                {{ $habit->habitLogs->count() }} times
                @endif
            </p>
        @empty
            <h2 class="text-lg font-semibold">Nenhum habito por aqui ainda</h2>
            <p class="max-w-sm text-sm text-slate-600">
                Assim que voce cadastrar um habito, ele aparece nesta lista com o historico de conclusoes.
            </p>
        @endforelse
        </div>
    </section>
</x-layout>
