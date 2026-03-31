<?php
require 'configue.php';

     if(isset($_GET['id'])){
        $id=$_GET['id'];
    $stmt=$pdo->prepare("DELETE FROM utilisateur WHERE id=:id");
    $stmt->execute([
        'id'=>$id,
    ]);
    header('Location:select.php');
    exit;

     }

?>
