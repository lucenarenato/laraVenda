const zipcodeField = document.getElementById('zipcodeField');

if (zipcodeField) {
    zipcodeField.addEventListener('input', function() {
        const zipcode = zipcodeField.value;

        if (zipcode.length === 8) {
            fetch(`https://viacep.com.br/ws/${zipcode}/json/`)
            .then(response => response.json())
            .then(response => {
                if (response.erro) {
                    console.error('O cep informado é inválido.')
                    return;
                }

                document.getElementsByName('public_place')[0].value = response.logradouro || '';
                document.getElementsByName('neighborhood')[0].value = response.bairro || '';
                document.getElementsByName('city')[0].value = response.localidade || '';
                document.getElementsByName('state')[0].value = response.uf || '';
            })
            .catch(error => console.error(error));
        }
    });
}
