<?php require 'configue.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label>Nom</label>
        <input type="text" name="nom" placeholder="entrer le nom"><br>
        <label>Email</label>
        <input type="email" name="email" placeholder="entrer email"><br>
        <label>Telephone</label>
        <input type="telephone" name="telephone" placeholder="numéro de telephone"><br>
        <label>Age</label>
        <input type="number" name="age" placeholder="entrer age"><br>
        <button type="submit" name="ok">ok</button>

    </form>
</body>
</html>



<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
$nom=$_POST['nom'];
$email=$_POST['email'];
$tel=$_POST['telephone'];
$age=$_POST['age'];

if(empty($nom)||empty($email)||empty($tel)||empty($age)){
    echo "tous les champs sont obligatoires";
}else{
    if($age<18){
        echo "age non valide";
    }else{

        $stmt=$pdo->prepare("INSERT INTO utilisateur(nom, email, telephone, age) VALUES(:nom, :email, :telephone, :age)");
        $stmt->execute([
            'nom'=>$nom,
            'email'=>$email,
            'telephone'=>$tel,
            'age'=>$age
        ]);

        header('Location:select.php');
        exit;

}
}
}

?>