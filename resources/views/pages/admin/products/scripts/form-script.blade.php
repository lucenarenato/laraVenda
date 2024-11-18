
<script>
    $('.categories-select').toggleClass('hide');
    $('.categories-select').select2({
        language: {
            noResults: function () {
                return "Nenhuma categoria encontrada.";
            }
        },
    });
</script>
