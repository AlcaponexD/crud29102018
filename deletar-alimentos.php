<?php
/**
 * Created by PhpStorm.
 * User: LionSoft
 * Date: 11/10/2018
 * Time: 14:37
 */
require_once 'conexao.php';

$query = "DELETE FROM alimentos where id = :id";

$smtm = $conexao->prepare($query);

$id = $_GET['id'];

$smtm->bindParam(":id", $id);


$smtm->execute();

if ($smtm->rowCount() <= 0){
    echo "<script>alert('Tente novamente')</script>";
}else{
    header('Location:index.php');
}