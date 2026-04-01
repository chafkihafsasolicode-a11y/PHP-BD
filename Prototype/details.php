<?php
require 'config.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $stmt=$pdo->prepare("SELECT * FROM produits WHERE id=:id");
    $stmt->execute([
        'id'=>$id,

    ]);
    $produit=$stmt->fetch(PDO::FETCH_ASSOC);
        echo "<div>
       <h3>".$produit['nom']."</h3>
       <p>".$produit['prix']."</p>
       <p>".$produit['description']."</p>
       <p>".$produit['categorie']."</p>
        </div>";
}
?>
















?>