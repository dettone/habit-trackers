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



<x-layout>

<section class="container-page py-10 sm:py-14">
    <x-navbar />
    @if ($habits->isNotEmpty())
            <dl class="mt-8 grid gap-4 sm:grid-cols-3">
                <div class="card">
                    <dt class="text-sm font-medium text-slate-500">Habitos ativos</dt>
                    <dd class="mt-1 text-3xl font-bold tracking-tight">{{ $habits->count() }}</dd>
                </div>

                <div class="card">
                    <dt class="text-sm font-medium text-slate-500">Concluidos hoje</dt>
                    <dd class="mt-1 text-3xl font-bold tracking-tight text-emerald-600">
                        {{ $feitosHoje }}<span class="text-lg font-semibold text-slate-400">/{{ $habits->count() }}</span>
                    </dd>
                </div>

                <div class="card">
                    <dt class="text-sm font-medium text-slate-500">Registros no total</dt>
                    <dd class="mt-1 text-3xl font-bold tracking-tight">{{ $totalLogs }}</dd>
                </div>
            </dl>
        @endif

        <ul class="mt-6 grid gap-4 sm:grid-cols-2">
            @forelse ($habits as $habit)
                @php
                    $diasConcluidos = $habit->habitLogs
                        ->map(fn ($log) => \Illuminate\Support\Carbon::parse($log->completed_at)->toDateString())
                        ->all();
                    $concluidoHoje = in_array($hoje->toDateString(), $diasConcluidos, true);
                    $ultimoRegistro = $habit->habitLogs
                        ->sortByDesc('completed_at')
                        ->first()?->completed_at;
                @endphp

                <li class="card flex flex-col gap-4 transition-shadow hover:shadow-md">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex items-start gap-3">
                            <span @class([
                                'grid size-10 shrink-0 place-items-center rounded-full',
                                'bg-emerald-50 text-emerald-600' => $concluidoHoje,
                                'bg-brand-50 text-brand-600' => ! $concluidoHoje,
                            ])>
                                <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                     aria-hidden="true">
                                    <path d="m5 13 4 4L19 7" />
                                </svg>
                            </span>

                            <div>
                                <h2 class="text-lg font-semibold tracking-tight">{{ $habit->name }}</h2>
                                <p class="mt-0.5 text-sm text-slate-600">
                                    @if ($habit->habitLogs->isEmpty())
                                        Nenhum registro ainda.
                                    @else
                                        {{ $habit->habitLogs->count() }}
                                        {{ $habit->habitLogs->count() === 1 ? 'conclusao' : 'conclusoes' }} &middot;
                                        ultima em
                                        {{ \Illuminate\Support\Carbon::parse($ultimoRegistro)->format('d/m/Y') }}
                                    @endif
                                </p>
                            </div>
                        </div>

                        @if ($concluidoHoje)
                            <span class="badge border-emerald-200 bg-emerald-50 text-emerald-700">Feito hoje</span>
                        @endif
                    </div>

                    <div class="flex items-center justify-between gap-1 border-t border-slate-100 pt-4">
                        @for ($i = 6; $i >= 0; $i--)
                            @php
                                $dia = $hoje->copy()->subDays($i);
                                $marcado = in_array($dia->toDateString(), $diasConcluidos, true);
                            @endphp

                            <div class="flex flex-col items-center gap-1.5">
                                <span class="text-[11px] font-medium text-slate-400">
                                    {{ $iniciaisDaSemana[$dia->dayOfWeek] }}
                                </span>
                                <span @class([
                                        'size-7 rounded-lg border',
                                        'border-emerald-500 bg-emerald-500' => $marcado,
                                        'border-slate-200 bg-slate-50' => ! $marcado,
                                    ])
                                    title="{{ $dia->format('d/m/Y') }}{{ $marcado ? ' - concluido' : '' }}"></span>
                            </div>
                        @endfor
                    </div>

                    <div class="flex justify-end border-t border-slate-100 pt-4">
                        <form action="{{ route('habits.destroy', $habit) }}" method="POST" class="btn btn-error self-start sm:self-auto">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn">
                            <svg class="size-6" 
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true">
                                <path d="M3 6h18" />
                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                            </svg>
                            
                            Deletar este habito
                        </button>
                        </form>

   
                            <a href="{{ route("habits.edit", $habit->id) }}" class="btn">
                                <svg class="size-6"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                </svg>
                             Editar este habito
                           </a>
                   
                    </div>
                </li>
            @empty
                <li class="card col-span-full flex flex-col items-center gap-3 py-12 text-center">
                    <span class="grid size-12 place-items-center rounded-full bg-brand-50 text-brand-600">
                        <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <rect x="3" y="4" width="18" height="18" rx="2" />
                            <path d="M16 2v4M8 2v4M3 10h18" />
                        </svg>
                    </span>

                    <h2 class="text-lg font-semibold">Nenhum habito por aqui ainda</h2>
                    <p class="max-w-sm text-sm text-slate-600">
                        Assim que voce cadastrar um habito, ele aparece nesta lista com o historico de conclusoes.
                    </p>

                    <a href="{{ route('habits.create') }}" class="btn btn-primary mt-2">Criar primeiro habito</a>
                </li>
            @endforelse
        </ul>
            </section>
</x-layout>