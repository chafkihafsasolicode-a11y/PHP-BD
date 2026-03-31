<?php
require 'configue.php';

$sql="SELECT *FROM utilisateur";
$stmt=$pdo->query($sql);

$utilisateurs=$stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table border='1'>
<tr>
   <th>ID</th>
   <th>Nom</th>
   <th>Email</th>
   <th>Telephone</th>
   <th>Age</th>
   <th>Action</th>
</tr>";
 
foreach($utilisateurs as $utilisateur){
    echo "<tr>
       <td>{$utilisateur['id']}</td>
       <td>{$utilisateur['nom']}</td>
       <td>{$utilisateur['email']}</td>
       <td>{$utilisateur['telephone']}</td>
       <td>{$utilisateur['age']}</td>
       <td><a href='modifier.php?id=".$utilisateur['id']."'> Modifier </a><a href='supprimer.php?id=".$utilisateur['id']."'> /Supprimer </a></td>
    </tr>";
}
echo "</table>";



















?>