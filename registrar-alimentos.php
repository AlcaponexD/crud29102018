<?php require_once 'conexao.php'?>
<?php
/**
 * Created by PhpStorm.
 * User: LionSoft
 * Date: 11/10/2018
 * Time: 11:23
 */

$smtm = $conexao->prepare("insert into alimentos(nome, kcal , proteinas , carboidratos, color1 , color2, color3, color4, color5) VALUES (:nome, :kcal, :proteinas , :carboidratos, :color1, :color2, :color3, :color4, :color5)");

$nome = $_POST['nome'];
$kcal = $_POST['kcal'];
$proteinas = $_POST['proteinas'];
$carboidratos = $_POST['carboidratos'];
$color1 = $_POST['color1'];
$color2 = $_POST['color2'];
$color3 = $_POST['color3'];
$color4 = $_POST['color4'];
$color5 = $_POST['color5'];


$smtm->bindParam(":nome", $nome);
$smtm->bindParam(":kcal", $kcal);
$smtm->bindParam(":proteinas", $proteinas);
$smtm->bindParam(":carboidratos", $carboidratos);
$smtm->bindParam(":color1", $color1);
$smtm->bindParam(":color2", $color2);
$smtm->bindParam(":color3", $color3);
$smtm->bindParam(":color4", $color4);
$smtm->bindParam(":color5", $color5);



$smtm ->execute();


if($smtm->rowcount()<=0){
    echo '<script>alert("Ocorreu um erro!!"); </script>';
}else{
    echo '<script>alert("Cadastrado com sucesso!!"); </script>';
    header('Location: index.php');
}
?>