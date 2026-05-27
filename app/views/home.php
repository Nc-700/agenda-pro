<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Agendamento</title>

<style>
body{
    font-family:Arial;
    background:#f4f4f4;
    margin:0;
}

.container{
    max-width:700px;
    margin:auto;
    padding:40px;
}

.card{
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.1);
}

input, select, button{
    width:100%;
    padding:12px;
    margin-top:10px;
}

button{
    background:black;
    color:white;
    border:none;
    cursor:pointer;
}

.ok{
    background:#d4edda;
    color:#155724;
    padding:12px;
    border-radius:8px;
    margin-bottom:15px;
}
</style>
</head>
<body>

<div class="container">
<div class="card">

<?php if(isset($_GET['ok'])): ?>
<div class="ok">Agendado com sucesso.</div>
<?php endif; ?>

<h2>Agendar horário</h2>

<form method="post">

<input type="text" name="nome" placeholder="Nome" required>

<input type="text" name="telefone" placeholder="Telefone" required>

<select name="servico">
<option>Corte</option>
<option>Barba</option>
<option>Corte + Barba</option>
</select>

<input type="date" name="data" required>

<input type="time" name="hora" required>

<button>Agendar</button>

</form>

</div>
</div>

</body>
</html>