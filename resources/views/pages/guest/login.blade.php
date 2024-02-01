<x-app-layout>
    <section class="d-flex justify-content-center align-items-center h-100">
        <div class="container row justify-content-center">
            <form method="POST" action="{{ route('guest.login') }}" class="border border-dark-subtle p-4 col-md-8" style="max-width: 30rem;">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="">Email</label>
                        <input type="text" name="email" value="{{ old('email') ?? '' }}" class="w-100 px-2 py-1">
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="">Senha</label>
                        <input type="password" name="password" class="w-100 px-2 py-1">
                    </div>
                    <div class="col-md-12 mb-4 text-center">
                        <button type="submit" class="px-2 py-1">Entrar</button>
                    </div>
                    @if(count($errors))
                        <div class="col-md-12 mb-2">
                            <ul class="px-4 text-danger">
                                @if($errors->has('email'))
                                    <li>
                                        {{ $errors->first('email') ?? '' }}
                                    </li>
                                @endif
                                @if($errors->has('password'))
                                    <li>
                                        {{ $errors->first('password') ?? '' }}
                                    </li>
                                @endif
                                @if($errors->has('wrong'))
                                    <li>
                                        {{ $errors->first('wrong') ?? '' }}
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endif
                    <div class="col-md-12">
                        <label class="mt-1" for="">Ainda não possui uma conta?</label><br />
                        <a href="registrar" class="text-dark text-decoration-none">
                            <button type="button" class="px-2 py-1 mt-1">
                                Cadastrar
                            </button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
