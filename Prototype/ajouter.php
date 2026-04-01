<?php require 'config.php';
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
        <label>nom</label>
        <input type="text" name="nom">
        <label>prix</label>
        <input type="number" name="prix">
        <label>description</label>
        <input type="text" name="description">
        <label>categorie</label>
        <input type="text" name="categorie">
        <button type="submit" name="ok">ajouter</button>
    </form>
</body>
</html>


<?php

if(isset($_POST['ok'])){
    $nom=$_POST['nom'];
    $prix=$_POST['prix'];
    $description=$_POST['description'];
    $categorie=$_POST['categorie'];
    if(empty($nom)|| empty($prix)|| empty($description) || empty($categorie)){
        echo "tous les champs sont obligatoires";
    }else{
        
$stmt = $pdo->prepare("INSERT INTO produits (nom, prix, description, categorie) VALUES (:nom, :prix, :description, :categorie)");
$stmt->execute([
    'nom' => $nom,
    'prix' => $prix,
    'description' => $description,
    'categorie' => $categorie
]);
   header('Location:catalogue.php?ajouter=ajouter');
   exit;

    }

   
}

?>












