<?php
    $pdo = new PDO('mysql:host=localhost;dbname=projeto_bootstrap', 'root', '');

    $stmt = $pdo->prepare("SELECT * FROM sessao_sobre");
    $stmt->execute();

    $sobre = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Painel de controle</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous" defer></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top navbar-expand-sm py-1">
            <div class="container container-fluid">
                <a class="navbar-brand fw-bold" href="#">Danki code</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="nav navbar-nav links-nav">
                        <li class="nav-item" ref_sys="editar_sobre">
                            <a class="nav-link" aria-current="page" href="#">Editar sobre</a>
                        </li>
                        <li class="nav-item" ref_sys="cadastrar_membro">
                            <a class="nav-link" href="#">Cadastrar membro</a>
                        </li>
                        <li class="nav-item" ref_sys="lista_equipes">
                            <a class="nav-link" href="#">Lista de equipes</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a href="?sair" class="nav-link"><i class="bi bi-box-arrow-left me-2"></i>Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <header id="header" class="bg-secondary text-light">
            <div class="container">
                <div class="row py-3">
                    <div class="col-md-8">
                        <h2 class="fs-4 m-0"><i class="bi bi-gear fs-4"></i> Painel de controle</h2>
                    </div>
                    <div class="col-md-4 text-end">
                        <p class="m-0"><i class="bi bi-stopwatch fs-5"></i> Seu último login foi em: 20/12/2026</p>
                    </div>
                </div>
            </div>
        </header>

        <nav aria-label="breadcrumb shadow-sm">
            <div class="container my-3">
                <ol class="breadcrumb bg-light ps-2 py-1">
                    <li class="breadcrumb-item active">
                        <a href="#" class="link-underline link-underline-opacity-0 link-dark link-underline-opacity-100-hover">Home</a>
                    </li>
                </ol>
            </div>
        </nav>

        <main>
            <section class="principal">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="list-group mb-3">
                                <a href="#" class="list-group-item list-group-item-action cor-principal" ref_sys="editar_sobre">
                                    <i class="bi bi-pen"></i> Editar sobre
                                </a>
                                <a href="#" class="list-group-item list-group-item-action" ref_sys="cadastrar_membro">
                                    <i class="bi bi-person-plus"></i> Cadastrar membro
                                </a>
                                <a href="#" class="list-group-item list-group-item-action" ref_sys="lista_equipes">
                                    <i class="bi bi-card-list"></i> Lista de equipes 
                                    <span class="badge text-bg-secondary">2</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <?php
                                // Esse if identifica se o formulário de editar sobre foi preenchido e cadastra o código html no banco
                                if(isset($_POST['sobre'])) {
                                    if($pdo->exec("DELETE FROM sessao_sobre")) {
                                        $stmt = $pdo->prepare("INSERT INTO sessao_sobre(html_sobre) VALUES(:sobre)");
                                        $stmt->execute([
                                            ":sobre" => $_POST['sobre']
                                        ]);

                                        if($stmt) {
                                            $stmt = $pdo->prepare("SELECT * FROM sessao_sobre");
                                            $stmt->execute();
                                            
                                            $sobre = $stmt->fetch(PDO::FETCH_ASSOC);
                                            echo '<div class="alert alert-success" role="alert">Sessão <b>Sobre</b> editada com sucesso!</div>';
                                        }
                                    }
                                }

                                // Esse if identifica se o formulário de membro equipe foi preenchido e cadastra o membro da equipe no banco
                                if(isset($_POST['cadastrar_membro'])) {
                                    $stmt = $pdo->prepare("INSERT INTO sessao_equipes(
                                                                nome_membro,
                                                                descricao
                                                           ) 
                                                           VALUES(
                                                                :nome,
                                                                :descricao
                                                           )");

                                    if($stmt->execute([":nome" => $_POST['nomeMembro'], ":descricao" => $_POST['desc_membro']])) {
                                        echo '<div class="alert alert-success" role="alert">Membro de equipe cadastrado com sucesso</div>';
                                    }
                                }
                            ?>
                            
                            <div id="section_editar_sobre" class="panel mb-3 shadow-sm">
                                <div class="panel-header cor-principal py-1 ps-2">
                                    <h3 class="m-0 fs-4 fw-medium text-light">Editar sobre</h3>
                                </div>
                                <div class="panel-body bg-light p-3">
                                    <form method="post">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Código HTML:</label>
                                            <textarea name="sobre" id="codigoHtml" class="form-control" style="height: 150px; text-align: lef;">
                                                <?= $sobre['html_sobre']; ?>
                                            </textarea>
                                        </div>

                                        <input type="hidden" name="editar_sobre" value="">
                                        <button type="submit" name="acao" class="btn cor-principal text-light">Enviar</button>
                                    </form>
                                </div>
                            </div>

                            <div id="section_cadastrar_membro" class="panel mb-3 shadow-sm">
                                <div class="panel-header cor-principal py-1 ps-2">
                                    <h3 class="m-0 fs-4 fw-medium text-light">Cadastrar membro de equipe</h3>
                                </div>
                                <div class="panel-body bg-light p-3">
                                    <form method="post">
                                        <div class="mb-3">
                                            <label for="nomeMembro" class="form-label">Nome do mebro:</label>
                                            <input type="text" name="nomeMembro" id="nomeMembro" class="form-control" placeholder="Digite o nome do membro a ser cadastrado" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">Descrição do membro:</label>
                                            <textarea name="desc_membro" id="desc_membro" class="form-control" style="height: 150px;" placeholder="Escreva uma breve descição do membro como: suas qualidades, informações, etc" required></textarea>
                                        </div>

                                        <input type="hidden" name="cadastrar_membro">

                                        <button type="submit" class="btn cor-principal text-light" name="">Cadastrar</button>
                                    </form>
                                </div>
                            </div>

                            <div id="section_lista_equipes" class="panel mb-3 shadow-sm">
                                <div class="panel-header cor-principal py-1 ps-2">
                                    <h3 class="m-0 fs-4 fw-medium text-light">Lista de membros de equipes</h3>
                                </div>
                                <div class="panel-body bg-light p-3">
                                    <table class="table table-default table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Descrição</th>
                                                <th scope="col">Excluir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                // Seleciona todos os registros na tabela sessao_equipes e ordena por ordem crescente
                                                $membros = $pdo->query("SELECT * FROM sessao_equipes ORDER BY nome_membro ASC")->fetchAll(PDO::FETCH_ASSOC);

                                                foreach($membros as $linha) {
                                            ?>
                                            
                                            <tr>
                                                <th scope="row"><?= $linha['id']; ?></th>
                                                <td><?= $linha['nome_membro']; ?></td>
                                                <td><?= $linha['descricao']; ?></td>
                                                <td><button type="button" id_membro="<?= $linha['id']; ?>" class="btn btn-danger btn-deletar"><i class="bi bi-trash"></i></button></td>
                                            </tr>

                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U=" crossorigin="anonymous"></script>
        <script>
            $(() => {
                cliqueMenu();

                // Minha função não estava funcionando porque eu estava utilizando arrow function ao invés de uma função normal
                // isso aconteceu porque uma arrow function não cria contexto necessário para utilizar o this para referenciar o elemento clicado
                function cliqueMenu() {
                    $('.links-nav .nav-item, .list-group .list-group-item').click(function (e) {
                        $('.links-nav .nav-item, .list-group .list-group-item').removeClass('active').removeClass('cor-principal');
                        $('.links-nav .nav-item[ref_sys=' + $(this).attr('ref_sys') + ']').addClass('active').addClass('cor-principal');
                        $('.list-group .list-group-item[ref_sys=' + $(this).attr('ref_sys') + ']').addClass('active').addClass('cor-principal');
                        return false;
                    })
                }

                scrollItem();
                
                function scrollItem() {
                    $('.links-nav .nav-item, .list-group .list-group-item').click(function() {
                        var ref = '#section_' + $(this).attr('ref_sys');
                        var offset = $(ref).offset().top;
                        $('html, body').animate({'scrollTop' : offset - 50});
                    });
                }
            })

            // Quando clicamos no botão de excluir o membro, é realizada uma requisição ajax para
            // o arquivo PHP responsável por excluir o registro do banco. Após isso o dado some da tabela
            $('.btn-deletar').click(function(){
                var idMembro = $(this).attr('id_membro');
                var elemento = $(this).parent().parent();

                $.ajax({
                    method: 'post',
                    data: {'id_membro': idMembro},
                    url: 'deletar.php'
                }).done(function(){
                    elemento.fadeOut(function(){
                        elemento.remove();
                    });
                });
            })
        </script>
    </body>
</html>