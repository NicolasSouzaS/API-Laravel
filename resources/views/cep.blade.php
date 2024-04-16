<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CEP</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<h1>Cep</h1>

<label for="cep">CEP</label>
<input type="text" id="cep" name="cep">
<button onclick="buscarCep()">Buscar CEP</button>

<div id="endereco">

<h2>cep: </h2>
<h2>logradouro:</h2>
<h2>complemento:</h2>
<h2>bairro:</h2>
<h2>localidade:</h2>
<h2>uf:</h2>
<h2>ibge:</h2>
<h2>gia:</h2>
<h2>ddd:</h2>
<h2>siafi:</h2>
</div>




<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>
    function buscarCep(){
        var cep = $('#cep').val();

        $.get('https://viacep.com.br/ws/' + cep + '/json/', function(data){
            $('#endereco').html('');
            $('#endereco').append('<h2>Dados de Endereço</h2>')
            $('#endereco').append('<h2>cep:' + data.cep+'</h2>')
            $('#endereco').append('<h2>logradouro:' + data.logradouro+'</h2>')
        })
    }
</script>


</body>
</html>
    