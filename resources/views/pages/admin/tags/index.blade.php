<x-dash-layout>
    <nav class="bg-white d-flex shadow-sm justify-content-between breadcrumb-nav">
        <ol class="breadcrumb px-4 py-3 m-0 text-secondary" style="--bs-breadcrumb-divider: '>>';">
            <li class="breadcrumb-item fw-bold">Etiquetas</li>
            <li class="breadcrumb-item fw-bold">Listar</li>
        </ol>
        <button class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#tagFormModal" id="newTagButton"><i
                class="fa-solid fa-circle-plus"></i>
            &nbsp; Novo</button>
    </nav>
    <main class="container py-4 mt-1">
        <div class="px-4 pt-2 pb-4">
            <div class="container rounded-3 mb-4 ml-2 p-4 bg-white">
                @csrf
                <form action="{{ route('tag.list') }}">
                    <div class="row">
                        <div class="col-md-9">
                            <input class="form-control" placeholder="Buscar Etiqueta ou Grupo" name="q"
                                value="{{ $_GET['q'] ?? '' }}"" type="text">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-secondary w-100">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                &nbsp;Buscar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="container rounded-3 p-4 bg-white">
                <input type="hidden" data-bs-toggle="modal" data-bs-target="#tagFormModal" id="editTagModalTrigger">
                @if (count($groups))
                    <table class="table overflow-hidden mt-3">
                        <tbody>
                            @foreach ($tags as $tag)
                                <tr>
                                    <td
                                        class="px-3 py-2 align-middle fw-bold text-tertiary {{ !$tag->group_id ? 'bg-body' : '' }}">
                                        <div class="d-flex justify-content-between align-items-center">
                                            @if ($tag->group_id)
                                                &#x25CF; &nbsp;
                                            @endif

                                            {{ $tag->name }}

                                            <div class="buttons-container" id="{{ $tag->id }}">
                                                <button type="button"
                                                    class="btn btn-outline-secondary border-0 edit-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                                    <i class="fa-solid fa-pen"></i>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-outline-secondary border-0 delete-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @if(!$tag->count_reference && $tag->type === 'group')
                                <tr>
                                    <td
                                        class="px-3 py-2 align-middle fw-bold text-tertiary">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <p class="px-3 py-2 text-tertiary text-center my-0">Nenhuma etiqueta encontrada.</p>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="px-3 py-2 text-tertiary text-center my-0">Nenhum grupo de etiquetas encontrado.</p>
                @endif
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="tagFormModal" tabindex="-1" aria-labelledby="tagFormModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="tagForm" action="" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="tagFormModalLabel">Criar/Editar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label class="mb-2" for="name">Nome</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label class="mb-2" for="type">Tipo</label>
                                <select class="form-select" name="type" id="type">
                                    <option value="group">Grupo</option>
                                    <option value="tag_name">Etiqueta</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-2 tag-group">
                                <label class="mb-2" for="group">Grupo</label>
                                <select class="form-select" name="group_id" id="group_id" required>
                                    @foreach ($groups as $group)
                                        <option class="group-option" value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-dash-layout>

<x-script-layout>
    <script>
        $('#newTagButton').on('click', function() {
            $('#tagForm').attr('action', `${window.location.origin}/etiquetas/adicionar`);
            $('input[name="_method"]').remove();

            $('.tag-group').hide();
            $('#group_id').removeAttr('required');

            $('.modal-title').text('Criar Etiqueta');

            $('#name').val('');
            $('#type').val('group');
            $('#description').val('');
            $('#group_id').val('');
        });

        $('#type').on('change', function() {
            if ($(this).val() === 'tag_name') {
                $('.tag-group').show();
                $('#group_id').prop('required', true);
            } else {
                $('.tag-group').hide();
                $('#group_id').removeAttr('required');
            }
        });

        $('.edit-btn').on('click', function() {
            $.ajax({
                url: `/etiquetas/${ $(this).parent().attr('id') }/editar`,
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
            }).done(({ data }) => {
                const { id, name, type, group_id, description } = data;
                const putInput = "<input type='hidden' name='_method' value='PUT'>";

                $('.group-option').each(function() {
                    $(this).show();

                    if (parseInt($(this).val()) === id) {
                        $(this).hide();
                    }
                });

                $('#editTagModalTrigger').trigger('click');
                $('.tag-group').show();

                $('#tagForm').attr('action', `${window.location.origin}/etiquetas/${id}/editar`);
                $('#tagForm').append(putInput);

                $('.modal-title').text('Editar Etiqueta');

                $('#name').val(name);
                $('#type').val(type);
                $('#description').val(description);

                $('#type').on('change', () => ($('#group_id').val(group_id)));

                if (type === 'tag_name') {
                    $('#group_id').val(group_id);
                    return;
                }

                $('.tag-group').hide();
            });
        });

        $('.delete-btn').on('click', function() {
            $.ajax({
                url: `/etiquetas/${ $(this).parent().attr('id') }/excluir`,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
            }).done(() => window.location.reload());
        });
    </script>
</x-script-layout>
