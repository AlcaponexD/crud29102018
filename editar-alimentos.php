
<!doctype html>
<html lang="pt-BR">
<?php include_once "conexao.php";

$id = $_GET['id'];

//Executa uma consulta do banco de dados
$smtm = $conexao->prepare("SELECT * FROM alimentos WHERE  id = :id");
$smtm->bindValue(':id', $id);
//Executa a consulta acima e grava na variavel os dados
$smtm->execute();

$results_name = $smtm->fetchALL(PDO::FETCH_ASSOC);
foreach($results_name as $key =>$value){;
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar alimentos  KlikFit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/index.php">Cadastro</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>
<div class="container">
    <h3>Editar informações</h3>
    <div class="row">
        <form action="editar-alimentos-post.php" method="post">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Nome:</label>
                    <input type="text" class="form-control form-control-sm" name="nome" value="<?= $value['nome'];?>" aria-describedby="alimentoNome" placeholder="Nome do alimento">
                </div>
                <div class="form-group col-md-6">
                    <label>Color1:</label>
                    <input type="text" class="form-control form-control-sm jscolor" name="color1" value="<?= $value['color1'];?>" aria-describedby="alimentoColor" placeholder="Color RGB1 do alimento">
                </div>
                <div class="form-group col-md-6">
                    <label>Kcal/100gr:</label>
                    <input type="text" class="form-control form-control-sm" name="kcal"  value="<?= $value['kcal'];?>"aria-describedby="alimentoKcal" placeholder="Calorias do alimento">
                </div>

                <div class="form-group col-md-6">
                    <label>Color2:</label>
                    <input type="text" class="form-control form-control-sm jscolor" name="color2" value="<?= $value['color2'];?>" aria-describedby="alimentoColor" placeholder="Color RGB2 do alimento">
                </div>
                <div class="form-group col-md-6">
                    <label>Proteinas/100gr:</label>
                    <input type="text" class="form-control form-control-sm" name="proteinas" value="<?= $value['proteinas'];?>" aria-describedby="alimentoKcal" placeholder="Proteinas do alimento">
                </div>
                <div class="form-group col-md-6">
                    <label>Color3:</label>
                    <input type="text" class="form-control form-control-sm jscolor" name="color3"  value="<?= $value['color3'];?>"aria-describedby="alimentoColor" placeholder="Color RGB3 do alimento">
                </div>
                <div class="form-group col-md-6">
                    <label>Carboidratos/100gr:</label>
                    <input type="text" class="form-control form-control-sm" name="carboidratos"  value="<?= $value['carboidratos'];?>"aria-describedby="alimentoKcal" placeholder="Proteinas do alimento">
                </div>
                <div class="form-group col-md-6">
                    <label>Color4:</label>
                    <input type="text" class="form-control form-control-sm jscolor" name="color4" value="<?= $value['color4'];?>" aria-describedby="alimentoColor" placeholder="Color RGB4 do alimento">
                </div>
                <div class="form-group col-md-6">

                </div>
                <div class="form-group col-md-6">
                    <label>Color5:</label>
                    <input type="text" class="form-control form-control-sm jscolor" name="color5"  value="<?= $value['color5'];?>"aria-describedby="alimentoColor" placeholder="Color RGB5 do alimento">
                    <input type="hidden" name="id" value="<?= $value['id'];?>">
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
    <?php } ?>
</div>
<script src="jscolor.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>