<?php
require 'connexion.php';

     if(isset($_GET['id'])){
        $id=$_GET['id'];
    $stmt=$pdo->prepare("DELETE FROM produits WHERE id=:id");
    $stmt->execute([
        'id'=>$id,
    ]);
    header('Location:lister.php');
    exit;

     }

?>