   


 <nav class="mt-6">
            <ul class="flex items-center gap-4">
                <li class="active">
                    <a href="{{ route('site.dashboard') }}" class="{{ request()->routeIs('site.dashboard') ? 'btn-primary' : '' }} btn  hover:underline font-semibold" >Hoje</a>
                </li>
                <li>
                    <a href="{{ route('habits.history') }}" class="{{ request()->routeIs('habits.history') ? 'btn-primary' : '' }} btn hover:underline font-semibold">Historico</a>
                </li>
                <li>
                    <a href="{{ route('habits.create') }}" class="{{ request()->routeIs('habits.create') ? 'btn-primary' : '' }} btn hover:underline font-semibold">Gerenciar Habitos</a>
                </li>
            </ul>
        </nav>