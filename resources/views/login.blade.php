<x-layout>
    <section class="container-page py-12 sm:py-20">
        <div class="mx-auto w-full max-w-md">
            <div class="text-center">
                <h1 class="text-3xl font-bold tracking-tight">Bem-vindo de volta</h1>
                <p class="mt-2 text-slate-600">Entre para continuar acompanhando seus habitos.</p>
            </div>

            <form action="{{ route('login.auth') }}" method="POST" class="card mt-8 flex flex-col gap-5">
                @csrf

                <div class="field">
                    <label for="email" class="label">Email</label>
                    <input type="email" name="email" id="email" placeholder="seuemail@provedor.com"
                           class="input @error('email') input-error @enderror">
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="password" class="label">Senha</label>
                    <input type="password" name="password" id="password" placeholder="Sua senha"
                           class="input @error('password') input-error @enderror">
                    @error('password')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-full">Login</button>
            </form>

            <p class="mt-6 text-center text-sm text-slate-600">
                Ainda nao tem uma conta?
                <a href="{{ route('site.register') }}" class="link">Registre-se</a>
            </p>
        </div>
    </section>
</x-layout>
