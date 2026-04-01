<?php
require 'connexion.php';

$sql="SELECT * FROM produits";
$stmt=$pdo->query($sql);
$produits=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<form method="POST">
    <label>Nom produit</label>
    <input type="text" name="nom" placeholder="chercher produit">
    <button type="submit" name="ok">rechercher</button>
  </form>
  <?php

  if(isset($_POST['ok']) && !empty($_POST['nom'])){
    $mot=$_POST['nom'];

    $stmt=$pdo->prepare("SELECT * FROM produits WHERE nom LIKE :mot");
    $stmt->execute([
      'mot'=>"%$mot%"
    ]);
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }




  foreach ($produits as $produit) {
    echo" <div>
    <h3>{$produit['nom']}</h3>
    <p>{$produit['prix']}</p>
    <p>{$produit['description']}</p>
    <a href='modifier.php?id={$produit['id']}'>Modifier</a><br>
    <a href='supprimer.php?id={$produit['id']}'>Supprimer</a> 
    </div>";
  }

  ?>
</body>
</html>







