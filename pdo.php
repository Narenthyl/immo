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

    function selectProprietairesPage($limit, $offset){
        global $pdo;//rend la variable globale
        $sql = 'SELECT * FROM offres.proprietaires LIMIT '.$limit.' OFFSET ' .$offset.';';
        $requete = $pdo->query($sql);
        return $requete->fetchAll();
    }
    //liste des biens
    $sql = "SELECT * 
            FROM offres.biens b 
            INNER JOIN offres.villes v
            ON v.codeville = b.codeville
            INNER JOIN offres.typestransactions tt
            ON tt.codetransaction = b.codetransaction
            INNER JOIN offres.typesbiens tb
            ON tb.codebien = b.codebien
            ORDER BY montant DESC";

    //Creer requete
    $requete = $pdo->query($sql);
     //Extraction données
    $biens = $requete->fetchAll();

//diverses fonctions pour selectionner des biens selon le filtre choisi
    function selectbiens3($transaction, $type)
    {
        global $pdo;//rend la variable globale
        $sql1="SELECT * 
            FROM offres.biens b 
            INNER JOIN offres.villes v
            ON v.codeville = b.codeville
            INNER JOIN offres.typestransactions tt
            ON tt.codetransaction = b.codetransaction
            INNER JOIN offres.typesbiens tb
            ON tb.codebien = b.codebien
            WHERE b.codetransaction='".$transaction."' AND b.codebien ='".$type."' 
            ORDER BY montant DESC";
        $requete1 = $pdo->query($sql1);
        return $requete1->fetchAll();
    }

    function selectbiens($page)
    {
        if ($page<=0){
            global $pdo;//rend la variable globale
            $sql1="SELECT * 
                FROM offres.biens b 
                INNER JOIN offres.villes v
                ON v.codeville = b.codeville
                INNER JOIN offres.typestransactions tt
                ON tt.codetransaction = b.codetransaction
                INNER JOIN offres.typesbiens tb
                ON tb.codebien = b.codebien
                ORDER BY montant DESC";
            $requete1 = $pdo->query($sql1);
            return $requete1->fetchAll();
        }else {
            global $pdo;//rend la variable globale
            $sql1="SELECT * 
                FROM offres.biens b 
                INNER JOIN offres.villes v
                ON v.codeville = b.codeville
                INNER JOIN offres.typestransactions tt
                ON tt.codetransaction = b.codetransaction
                INNER JOIN offres.typesbiens tb
                ON tb.codebien = b.codebien
                ORDER BY montant DESC
                LIMIT 10 OFFSET ".(($page-1)*10).";";
            $requete1 = $pdo->query($sql1);
            return $requete1->fetchAll();
        }

    }

    function selectbiens1($transaction, $page)
    {
        if ($page <=0){
            global $pdo;//rend la variable globale
            $sql1="SELECT * 
                    FROM offres.biens b 
                    INNER JOIN offres.villes v
                    ON v.codeville = b.codeville
                    INNER JOIN offres.typestransactions tt
                    ON tt.codetransaction = b.codetransaction
                    INNER JOIN offres.typesbiens tb
                    ON tb.codebien = b.codebien
                    WHERE b.codetransaction='".$transaction."'
                    ORDER BY montant DESC";
            $requete1 = $pdo->query($sql1);
            return $requete1->fetchAll();
        }else{
            global $pdo;//rend la variable globale
            $sql1="SELECT * 
                    FROM offres.biens b 
                    INNER JOIN offres.villes v
                    ON v.codeville = b.codeville
                    INNER JOIN offres.typestransactions tt
                    ON tt.codetransaction = b.codetransaction
                    INNER JOIN offres.typesbiens tb
                    ON tb.codebien = b.codebien
                    WHERE b.codetransaction='".$transaction."'
                    ORDER BY montant DESC
                    LIMIT 10 OFFSET ".(($page-1)*10).";";
            $requete1 = $pdo->query($sql1);
            return $requete1->fetchAll();
        }

    }

    function selectbiens2($type, $page)
    {

        if ($page <=0){
            global $pdo;//rend la variable globale
            $sql1="SELECT * 
                    FROM offres.biens b 
                    INNER JOIN offres.villes v
                    ON v.codeville = b.codeville
                    INNER JOIN offres.typestransactions tt
                    ON tt.codetransaction = b.codetransaction
                    INNER JOIN offres.typesbiens tb
                    ON tb.codebien = b.codebien
                    WHERE b.codebien ='".$type."' 
                    ORDER BY montant DESC";
            $requete1 = $pdo->query($sql1);
            return $requete1->fetchAll();
        }else{
            global $pdo;//rend la variable globale
            $sql1="SELECT * 
                    FROM offres.biens b 
                    INNER JOIN offres.villes v
                    ON v.codeville = b.codeville
                    INNER JOIN offres.typestransactions tt
                    ON tt.codetransaction = b.codetransaction
                    INNER JOIN offres.typesbiens tb
                    ON tb.codebien = b.codebien
                    WHERE b.codebien ='".$type."' 
                    ORDER BY montant DESC
                    LIMIT 10 OFFSET ".(($page-1)*10).";";
            $requete1 = $pdo->query($sql1);
            return $requete1->fetchAll();
        }

    }
    //select propriétaire
    function selectproprio($idp)
    {
        global $pdo;//rend la variable globale
        $sql1="SELECT * FROM offres.proprietaires WHERE numeroproprietaire=".$idp.";";
        $requete1 = $pdo->query($sql1);
        return $requete1->fetch();
    }

    function selectbienproprio($idp)
    {
        global $pdo;//rend la variable globale
        $sql1="SELECT * 
            FROM offres.biens b 
            INNER JOIN offres.villes v
            ON v.codeville = b.codeville
            INNER JOIN offres.typestransactions tt
            ON tt.codetransaction = b.codetransaction
            INNER JOIN offres.typesbiens tb
            ON tb.codebien = b.codebien
            WHERE numeroproprietaire =".$idp."
            ORDER BY montant DESC";
        $requete1 = $pdo->query($sql1);
        return $requete1->fetchAll();
    }

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



