<?php
    if(isset($_POST['id_membro'])) {
        $pdo = new PDO('mysql:host=localhost;dbname=projeto_bootstrap', 'root', '');

        $id = $_POST['id_membro'];

        try {
            $stmt = $pdo->prepare("DELETE FROM sessao_equipes WHERE id = :id");
            
            $stmt->execute([
                ":id" => $id
            ]);
        } catch(PDOException $erro) {
            echo $erro;
            exit();
        }
    }
?>