<?php
require 'connexion.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $stmt=$pdo->prepare("SELECT * FROM produits WHERE id=:id");
    $stmt->execute([
        'id'=>$id
    ]);
    $produit=$stmt->fetch(PDO::FETCH_ASSOC);
}

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
        <input type="hidden" name="id" value="<?=$produit['id']?>">
        <label>Nom</label>
        <input type="text" name="nom" value="<?=$produit['nom']?>">
        <label>Prix</label>
        <input type="number" name="prix" value="<?=$produit['prix']?>">
        <label>description</label>
        <input type="text" name="description" value="<?=$produit['description']?>">
        <label>Categorie</label>
        <input type="text" name="categorie" value="<?=$produit['categorie']?>">
        <button type="submit" name="ok">modifier</button>




    </form>
</body>
</html>


<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    $id=$_POST['id'];
    $nom=$_POST['nom'];
    $prix=$_POST['prix'];
    $description=$_POST['description'];
    $categorie=$_POST['categorie'];

    
  $stmt=$pdo->prepare("UPDATE produits SET nom=:nom, prix=:prix, description=:description, categorie=:categorie WHERE id=:id");
  $stmt->execute([
    'id'=>$id,
    'nom'=>$nom,
    'prix'=>$prix,
    'description'=>$description,
    'categorie'=>$categorie
    ]);
    header('Location:lister.php');
    exit;
  }
  ?>


