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
        <nav class="navbar navbar-default navbar-expand-sm py-1">
            <div class="container container-fluid">
                <a class="navbar-brand fw-bold" href="#">Danki code</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="nav navbar-nav links-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#" ref_sys="editar_sobre">Editar sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" ref_sys="cadastrar_membro">Cadastrar membro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" ref_sys="lista_equipes">Lista de equipes</a>
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
                            <ul class="list-group shadow-sm mb-3">
                                <li class="list-group-item cor-principal" ref_sys="editar_sobre">
                                    <i class="bi bi-pen"></i> Editar sobre
                                </li>
                                <li class="list-group-item" ref_sys="cadastrar_membro">
                                    <i class="bi bi-person-plus"></i> Cadastrar membro
                                </li>
                                <li class="list-group-item" ref_sys="lista_equipes">
                                    <i class="bi bi-card-list"></i> Lista de equipes
                                    <span class="badge text-bg-secondary text-end">2</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="panel mb-3 shadow-sm">
                                <div class="panel-header cor-principal py-1 ps-2">
                                    <h3 class="m-0 fs-4 fw-medium text-light">Editar sobre</h3>
                                </div>
                                <div class="panel-body bg-light p-3">
                                    <form>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Código HTML:</label>
                                            <textarea name="codigoHtml" id="codigoHtml" class="form-control" style="height: 150px;"></textarea>
                                        </div>

                                        <button type="submit" class="btn cor-principal text-light">Enviar</button>
                                    </form>
                                </div>
                            </div>

                            <div class="panel mb-3 shadow-sm">
                                <div class="panel-header cor-principal py-1 ps-2">
                                    <h3 class="m-0 fs-4 fw-medium text-light">Cadastrar membro de equipe</h3>
                                </div>
                                <div class="panel-body bg-light p-3">
                                    <form>
                                        <div class="mb-3">
                                            <label for="nomeMembro" class="form-label">Nome do mebro:</label>
                                            <input type="text" name="nomeMembro" id="nomeMembro" class="form-control" placeholder="Digite o nome do membro a ser cadastrado">
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">Descrição do membro:</label>
                                            <textarea name="codigoHtml" id="codigoHtml" class="form-control" style="height: 150px;" placeholder="Escreva uma breve descição do membro como: suas qualidades, informações, etc"></textarea>
                                        </div>

                                        <button type="submit" class="btn cor-principal text-light">Cadastrar</button>
                                    </form>
                                </div>
                            </div>

                            <div class="panel mb-3 shadow-sm">
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
                                                for ($i = 0; $i < 5; $i++) {
                                            ?>
                                            
                                            <tr>
                                                <th scope="row"><?= $i + 1; ?></th>
                                                <td>Mark</td>
                                                <td>Mark parece normal mas ele é viado</td>
                                                <td><button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button></td>
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

                function cliqueMenu() {
                    $('.links-nav .nav-item, .list-group .list-group-item').click(() => {
                        // alert($(this).attr("ref_sys"));
                        console.log($(this).attr('class'));
                        return false;
                    })
                }
            })
        </script>
    </body>
</html>