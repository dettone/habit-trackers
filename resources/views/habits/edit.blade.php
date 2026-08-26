<x-layout>
    <section class="container-page py-12 sm:py-20">
        <div class="mx-auto w-full max-w-md">
            <div class="text-center">
                <h1 class="text-3xl font-bold tracking-tight">Editar habito</h1>
                <p class="mt-2 text-slate-600">Edite o habito que voce quer acompanhar.</p>
            </div>

            <form action="{{ route('habits.update', $habit) }}" method="POST" class="card mt-8 flex flex-col gap-5">
                @csrf
                @method("PUT")

                <div class="field">
                    <label for="name" class="label">Nome do habito</label>
                    <input type="text" name="name" id="name" placeholder="Ex: Ler dez paginas"
                           class="input @error('name') input-error @enderror" value="{{ $habit->name }}">
                    @error('name')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-full">Atualizar habito</button>
            </form>
        </div>
    </section>
</x-layout>
