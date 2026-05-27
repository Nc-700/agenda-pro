<?php
session_start();
require '../../config/db.php';

if(!isset($_SESSION['admin'])){
header('Location:login.php');
exit;
}

$id = $_GET['id'];

if($_POST){

$sql = $pdo->prepare(
"UPDATE agendamentos
SET nome=?, telefone=?, servico=?, data=?, hora=?, status=?
WHERE id=?"
);

$sql->execute([
$_POST['nome'],
$_POST['telefone'],
$_POST['servico'],
$_POST['data'],
$_POST['hora'],
$_POST['status'],
$id
]);

header('Location:dashboard.php');
exit;
}

$sql = $pdo->prepare(
"SELECT * FROM agendamentos WHERE id=?"
);

$sql->execute([$id]);
$item = $sql->fetch();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Editar</title>
</head>
<body>

<h2>Editar Agendamento</h2>

<form method="post">

<input name="nome" value="<?= $item['nome'] ?>">

<input name="telefone" value="<?= $item['telefone'] ?>">

<select name="servico">

<option
<?= $item['servico'] == 'Corte' ? 'selected' : '' ?>>
Corte
</option>

<option
<?= $item['servico'] == 'Barba' ? 'selected' : '' ?>>
Barba
</option>

<option
<?= $item['servico'] == 'Corte + Barba' ? 'selected' : '' ?>>
Corte + Barba
</option>

</select>

<input type="date" name="data" value="<?= $item['data'] ?>">

<input type="time" name="hora" value="<?= $item['hora'] ?>">

<select name="status">
<option>Pendente</option>
<option>Confirmado</option>
<option>Finalizado</option>
<option>Cancelado</option>
</select>

<button>Salvar</button>

</form>

</body>
</html>