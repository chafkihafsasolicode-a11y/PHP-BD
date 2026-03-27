<?php
try {
    $pdo= new PDO("mysql:host=localhost;dbname=blogdb",'root','');
    $pdo->setAttribute(PDO::ATTRR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connexion réussie";

} catch (PDOException $e) {
    echo " erreur de connexion : " .$e->getMessage();
}


try {
   $pdo->query("SELECT * FROM table_inexistante");
} catch (PDOException $e) {
    echo " erreur SQL : " . $e->getMessage();

}catch (PDOException $e){
    file_put_contents('erreurs.log', $e->getMessage(), FILE_APPEND);
    echo " une erreur est survenue. Contactez l'administrateur ";
}



























?>