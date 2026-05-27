<?php
session_start();
require '../../config/db.php';

if($_POST){

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = $pdo->prepare(
        "SELECT * FROM usuarios WHERE usuario=? AND senha=?"
    );

    $sql->execute([$usuario,$senha]);

    if($sql->rowCount() > 0){

        $_SESSION['admin'] = true;

        header('Location:dashboard.php');
        exit;
    }

    $erro = 'Usuário ou senha inválidos';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login Admin</title>
</head>
<body>

<h2>Login Admin</h2>

<?php if(isset($erro)) echo $erro; ?>

<form method="post">
<input name="usuario" placeholder="Usuário">
<input type="password" name="senha" placeholder="Senha">
<button>Entrar</button>
</form>

</body>
</html>