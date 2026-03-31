<?php 
require 'configue.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $stmt=$pdo->prepare("SELECT * FROM utilisateur WHERE id=:id");
    $stmt->execute([
        'id'=>$id
    ]);
    $users=$stmt->fetch(PDO::FETCH_ASSOC);
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
         <input type="hidden" name="id" value="<?=$users['id']?>">
        <label>Nom</label>
        <input type="text" name="nom" value="<?=$users['nom']?>"> <br>
        <label>Email</label>
        <input type="email" name="email" value="<?=$users['email']?>"><br>
        <label>Telephone</label>
        <input type="telephone" name="telephone" value="<?=$users['telephone']?>"><br>
        <label>Age</label>
        <input type="number" name="age" value="<?=$users['age']?>"><br>
        <button type="submit" name="ok">ok</button>
</body>
</html>


<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    $id=$_POST['id'];
    $nom=$_POST['nom'];
    $email=$_POST['email'];
    $tel=$_POST['telephone'];
    $age=$_POST['age'];

  $stmt=$pdo->prepare("UPDATE utilisateur SET nom=:nom, email=:email, telephone=:telephone, age=:age WHERE id=:id");
  $stmt->execute([
    'id'=>$id,
    'nom'=>$nom,
    'email'=>$email,
    'telephone'=>$tel,
    'age'=>$age
  ]);

  header('Location:select.php');
  exit;
}
?>