<x-layout>
    @php
        $hoje = today();
        $totalLogs = $habits->sum(fn ($habit) => $habit->habitLogs->count());
        $feitosHoje = $habits->filter(
            fn ($habit) => $habit->habitLogs->contains(
                fn ($log) => \Illuminate\Support\Carbon::parse($log->completed_at)->isSameDay($hoje)
            )
        )->count();
        $iniciaisDaSemana = ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'];
    @endphp


    <section class="container-page py-10 sm:py-14">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h1 class="text-3xl font-bold tracking-tight sm:text-4xl">Dashboard</h1>
                <p class="mt-2 text-slate-600">
                    Bem-vindo de volta, {{ auth()->user()->name }}. Aqui voce acompanha seus habitos do dia.
                </p>
            </div>

            <a href="{{ route('habits.create') }}" class="btn btn-primary self-start sm:self-auto">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M12 5v14M5 12h14" />
                </svg>
                Novo habito
            </a>
        </div>

        @session('success')
            <div role="status"
                 class="mt-6 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
                <svg class="size-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="m5 13 4 4L19 7" />
                </svg>
                {{ session('success') }}
            </div>
        @endsession
        <x-navbar />

        <div class="card">
            <div class="text-end text-slate-400 mb-2 font-semibold">Hoje: {{ date('d/m/Y') }}</div>
        <ul>
            @foreach ($habits as $habit)
             @php
                 $marcado = $habit->habitLogs->contains(fn($log) => \Illuminate\Support\Carbon::parse($log->completed_at)->isSameDay($hoje));
                 $class = $marcado ? 'bg-emerald-100 border-emerald-300' : 'bg-slate-50 border-slate-300';
           @endphp
                 <form method="POST" action="{{ route('habits.check', $habit->id) }}" class="{{ $class }} flex items-center rounded-lg p-4 mb-2 shadow-md hover:shadow-xl hover:cursor-pointer transition-shadow">
                    @csrf
                    <input type="checkbox" name="{{ $marcado ? 'completed' : 'uncompleted' }}" 
                    id="" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500" 
                    {{ $marcado ? 'checked' : '' }}
                    onchange="this.form.submit()"
                    />
                  <span class="ml-2 {{ $marcado ? 'text-emerald-600' : 'text-slate-900' }}">{{ $habit->name }}</span>
                 </form>
            @endforeach
        </ul>
       </div>
    </section>
</x-layout>
