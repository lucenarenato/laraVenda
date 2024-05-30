@php
    $isToUpdate = isset($user) && $user->id;
    $route = $isToUpdate ? 'user.update' : 'user.create';
@endphp

<main class="bg-white container py-4" style="margin-top: 3.05rem;">
    <div class="px-4 py-2">
        <form action="{{ route($route) }}" method="POST" class="w-100 h-100 mt-4">
            @csrf

            @if($isToUpdate)
                @method('PUT')
            @endif

            <strong class="mb-3 d-block text-tertiary">Dados Cadastrais</strong>
            <div class="row pb-2">
                <div class="col-md-6">
                    <label class="fw-bold">Nome</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="name" value="{{ $user->name ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label class="fw-bold">Email</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="email" value="{{ $user->email ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label class="fw-bold">Senha</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="password" name="password">
                </div>
                <div class="col-md-6">
                    <label class="fw-bold">Confirmar Senha</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="password" name="confirm_password">
                </div>
            </div>
            <hr>
            <strong class="mt-4 mb-3 d-block text-tertiary">Endereço</strong>
            <div class="row">
                <div class="col-md-4">
                    <label class="fw-bold">CEP</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="zipcode" id="zipcodeField" value="{{ $user->address->zipcode ?? '' }}">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Logradouro</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="public_place" value="{{ $user->address->public_place ?? '' }}">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Número</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="address_number" value="{{ $user->address->address_number ?? '' }}">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Bairro</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="neighborhood" value="{{ $user->address->neighborhood ?? '' }}">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Cidade</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="city" value="{{ $user->address->city ?? '' }}">
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Estado</label><br />
                    <input class="w-100 form-control mt-2 mb-3" type="text" name="state" value="{{ $user->address->state ?? '' }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-4 text-end">
                    <button type="submit" class="btn btn-success px-4 py-2">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</main>

@section('js_file')
    <script src="{{ asset('js/zipcodeSearcher.js') }}"></script>
@endsection
