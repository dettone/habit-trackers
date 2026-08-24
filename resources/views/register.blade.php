<x-layout>
    <section class="container-page py-12 sm:py-20">
        <div class="mx-auto w-full max-w-md">
            <div class="text-center">
                <h1 class="text-3xl font-bold tracking-tight">Crie sua conta</h1>
                <p class="mt-2 text-slate-600">Leva menos de um minuto para comecar.</p>
            </div>

            <form action="{{ route('auth.register') }}" method="POST" class="card mt-8 flex flex-col gap-5">
                @csrf

                <div class="field">
                    <label for="name" class="label">Nome</label>
                    <input type="text" name="name" id="name" placeholder="Seu nome"
                           class="input @error('name') input-error @enderror">
                    @error('name')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

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

                <div class="field">
                    <label for="password_confirmation" class="label">Confirmar senha</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           placeholder="Confirme sua senha"
                           class="input @error('password_confirmation') input-error @enderror">
                    @error('password_confirmation')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-full">Registrar</button>
            </form>

            <p class="mt-6 text-center text-sm text-slate-600">
                Ja tem uma conta?
                <a href="{{ route('login') }}" class="link">Faca login</a>
            </p>
        </div>
    </section>
</x-layout>
