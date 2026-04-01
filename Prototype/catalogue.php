<?php
require 'config.php';
echo "<a href='ajouter.php'>Ajouter un produit</a>";
$sql="SELECT * FROM produits";
$stmt=$pdo->query($sql);
$produits=$stmt->fetchAll(PDO::FETCH_ASSOC);
if(isset($_GET['ajouter'])){
    if($_GET['ajouter']=='ajouter'){
        echo"produit ajouté avec succès";
    }
}
foreach($produits as $produit){
    echo "<div>
   <h3>".$produit['nom']."</h3>
   <p>".$produit['prix']."</p>
   <a href='details.php?id=".$produit['id']."'>details</a>
    </div>";
}
?>



















