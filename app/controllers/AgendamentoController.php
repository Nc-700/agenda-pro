<?php

class AgendamentoController {

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function handle(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $sql = $this->pdo->prepare("
                INSERT INTO agendamentos
                (nome, telefone, servico, data, hora)
                VALUES (?,?,?,?,?)
            ");

            $sql->execute([
                $_POST["nome"],
                $_POST["telefone"],
                $_POST["servico"],
                $_POST["data"],
                $_POST["hora"]
            ]);

            header("Location:index.php?ok=1");
            exit;
        }

        include "../app/views/home.php";
    }
}
?>