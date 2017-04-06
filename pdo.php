<?php
//include 'header.php';
include 'configuration.php';
?>

<?php

    //la chaine de connexion (le DSN)
    $dsn="pgsql:host=localhost;dbname=immo;port=5432;";

    //même chose avec la variable $config
   // $dsn = "pgsql:host={$config['host']};dbname={$config['database']};port={$config['port']};";

    // Une autre variante
  /*  $dsn = sprintf("pgsql:host=%s;dbname=%s;port=%d",
        $config['host'],
        $config['database'],
        $config['port']
    );*/

    //on créé un objet pdo
    $pdo = new PDO($dsn, $config['user'], $config['password']);

    //liste des propriétaires
    $sql = "SELECT * FROM offres.proprietaires";


    //Creer une requete
    $requete = $pdo->query($sql);

    //Extraire les données - V1
    $proprietaires = $requete->fetchAll();

    //liste des biens
    $sql = "SELECT * FROM offres.biens";

    //Creer requete
    $requete = $pdo->query($sql);
     //Extraction données
    $biens = $requete->fetchAll();

    //Parcourir les proprietaires et les afficher
   /* foreach ($proprietaires as $pro){
        echo $pro['nomproprietaire'];
        echo '<br>';
    }

    //Extraire les donneés - V2
    $proprietaires = $requete->fetchAll(PDO::FETCH_OBJ);

    //Parcourir les propriétaires et les afficher
    foreach ($proprietaires as $pro){
        echo $pro->nomproprietaire;
        echo '<br>';
    }*/
?>



