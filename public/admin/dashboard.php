<?php
session_start();
require '../../config/db.php';

if(!isset($_SESSION['admin'])){
header('Location:login.php');
exit;
}

// FINALIZAR
if(isset($_GET['finalizar'])){

$id = $_GET['finalizar'];

$pdo->prepare(
"UPDATE agendamentos
SET status='Finalizado'
WHERE id=?"
)->execute([$id]);

header('Location:dashboard.php');
exit;
}

// EXCLUIR
if(isset($_GET['del'])){

$id = $_GET['del'];

$pdo->prepare(
    "DELETE FROM agendamentos WHERE id=?"
)->execute([$id]);

header('Location:dashboard.php');
exit;
}

// LISTAR
$lista = $pdo->query(
    "SELECT * FROM agendamentos ORDER BY data,hora"
)->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Painel Admin</title>

<style>
body{
font-family:Arial;
background:#f4f4f4;
padding:30px;
}

table{
width:100%;
background:white;
border-collapse:collapse;
}

th,td{
padding:12px;
border:1px solid #ddd;
}

a{
text-decoration:none;
}
</style>
</head>
<body>

<h2>Painel Administrativo</h2>

<a href="logout.php">Sair</a>

<table>
<tr>
<th>ID</th>
<th>Nome</th>
<th>Telefone</th>
<th>Serviço</th>
<th>Data</th>
<th>Hora</th>
<th>Status</th>
<th>Ações</th>
</tr>

<?php foreach($lista as $item): ?>
<tr>
<td><?= $item['id'] ?></td>
<td><?= $item['nome'] ?></td>
<td><?= $item['telefone'] ?></td>
<td><?= $item['servico'] ?></td>
<td><?= $item['data'] ?></td>
<td><?= $item['hora'] ?></td>
<td><?= $item['status'] ?></td>
<td>
<a href="editar.php?id=<?= $item['id'] ?>">Editar |</a>
<a href="?finalizar=<?= $item['id'] ?>">
Finalizar
</a>

|

<a href="?del=<?= $item['id'] ?>">
Excluir
</a>

</td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html>