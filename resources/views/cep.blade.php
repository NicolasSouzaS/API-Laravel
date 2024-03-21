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
    function buscarCEP(){
        var cep = document.getElementById('cep').value;
    }
</script>
