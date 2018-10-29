<!doctype html>
<html lang="pt-BR">
<?php include_once "conexao.php";

//Executa uma consulta do banco de dados
$smtm = $conexao->prepare("SELECT * FROM alimentos ORDER BY 'id' DESC");
//Executa a consulta acima e grava na variavel os dados
$smtm->execute();

$results_name = $smtm->fetchALL(PDO::FETCH_ASSOC);

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro KlikFit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
          .dataTables_length{
                float:left;
            }
        .dataTables_filter{
            float:right;
        }
          .dataTables_filter input {
              width: 240px;
              border: solid 1px #2b2b4d;
          }
    </style>
</head>
<body>
<div class="container">
    <H1>Cadastro de alimentos - Klikfit</H1>
    <div class="row">
    <form action="registrar-alimentos.php" method="post">
        <div class="row">
            <div class="form-group col-md-6">
                <label>Nome:</label>
                <input type="text" class="form-control form-control-sm" name="nome" aria-describedby="alimentoNome" placeholder="Nome do alimento">
            </div>
            <div class="form-group col-md-6">
                <label>Color1:</label>
                <input type="text" class="form-control form-control-sm jscolor" name="color1" aria-describedby="alimentoColor" placeholder="Color RGB1 do alimento">
            </div>
            <div class="form-group col-md-6">
                <label>Kcal/100gr:</label>
                <input type="text" class="form-control form-control-sm" name="kcal" aria-describedby="alimentoKcal" placeholder="Calorias do alimento">
            </div>

            <div class="form-group col-md-6">
                <label>Color2:</label>
                <input type="text" class="form-control form-control-sm jscolor" name="color2" aria-describedby="alimentoColor" placeholder="Color RGB2 do alimento">
            </div>
            <div class="form-group col-md-6">
                <label>Proteinas/100gr:</label>
                <input type="text" class="form-control form-control-sm" name="proteinas" aria-describedby="alimentoKcal" placeholder="Proteinas do alimento">
            </div>
            <div class="form-group col-md-6">
                <label>Color3:</label>
                <input type="text" class="form-control form-control-sm jscolor" name="color3" aria-describedby="alimentoColor" placeholder="Color RGB3 do alimento">
            </div>
            <div class="form-group col-md-6">
                <label>Carboidratos/100gr:</label>
                <input type="text" class="form-control form-control-sm" name="carboidratos" aria-describedby="alimentoKcal" placeholder="Proteinas do alimento">
            </div>
            <div class="form-group col-md-6">
                <label>Color4:</label>
                <input type="text" class="form-control form-control-sm jscolor" name="color4" aria-describedby="alimentoColor" placeholder="Color RGB4 do alimento">
            </div>
            <div class="form-group col-md-6">

            </div>
            <div class="form-group col-md-6">
                <label>Color5:</label>
                <input type="text" class="form-control form-control-sm jscolor" name="color5" aria-describedby="alimentoColor" placeholder="Color RGB5 do alimento">
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
    <h3 style="margin-top: 40px;">Produtos cadastrados</h3>
    <table class="table table-striped table-bordered table-hover datatable" id="tabela" width="100%">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Kcal/100gr</th>
            <th>Proteinas/100gr</th>
            <th>Carboidratos/100gr</th>
            <th>Color1</th>
            <th>Color2</th>
            <th>Color3</th>
            <th>Color4</th>
            <th>Color5</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($results_name as $key => $value)
        {
            ?>
            <tr>
                <td><?= $value['nome'] ?></td>
                <td><?= $value['kcal'] ?></td>
                <td><?= $value['proteinas'] ?></td>
                <td><?= $value['carboidratos'] ?></td>
                <td style="background-color: #<?= $value['color1'] ?>;"><?= $value['color1'] ?></td>
                <td style="background-color: #<?= $value['color2'] ?>;"><?= $value['color2'] ?></td>
                <td style="background-color: #<?= $value['color3'] ?>;"><?= $value['color3'] ?></td>
                <td style="background-color: #<?= $value['color4'] ?>;"><?= $value['color4'] ?></td>
                <td style="background-color: #<?= $value['color5'] ?>;"><?= $value['color5'] ?></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Selecione
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item"  href="/editar-alimentos.php?id=<?php echo $value['id'] ?>">Editar</a>
                            <a class="dropdown-item"  href="/deletar-alimentos.php?id=<?php echo $value['id'] ?>">Excluir</a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php
        }

        ?>
        </tbody>
    </table>
</div>
</div>
<script src="jscolor.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>

    $(document).ready(function () {

        $('#tabela').DataTable({
            "autoWidth": true,
            "lengthMenu": [[10, 25, 50], [10, 25,50]],
            language: {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ Resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar ",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },

        });
    });

</script>
</body>
</html>