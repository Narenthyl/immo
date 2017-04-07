<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agence Immobilière</title>

    <script src="js/jquery-3.2.0.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <?php include 'navbar.php';include 'configuration.php'; include 'pdo.php';
        $transaction = null;
        $typebien = null;

        if (isset($_GET['transaction']) and isset($_GET['type'])){
            $biens2 = selectbiens3($transaction, $typebien);
        }elseif (isset($_GET['transaction'])){
            $count = selectbiens1($_GET['transaction'],0);//l'argument 0 renvoie la requete complète
            if (isset($_GET['page'])){
                $biens2 = selectbiens1($_GET['transaction'],$_GET['page']);
            }else{
                $biens2 = selectbiens(1);
            }

        }elseif (isset($_GET['type'])){
            $count = selectbiens2($_GET['type'],0);//l'argument 0 renvoie la requete complète
            if (isset($_GET['page'])){
                $biens2 = selectbiens2($_GET['type'], $_GET['page']);
            }else{
                $biens2 = selectbiens2($_GET['type'],1);
            }
        }else{
            $count = selectbiens(0);//l'argument 0 renvoie la requete complète
            if (isset($_GET['page'])){
                $biens2 = selectbiens($_GET['page']);
            }else{
                $biens2 = selectbiens(1);
            }

        }


    ?>
    <div class="container"> <!-- Contient toute la page -->
        <?php
        echo '<h1>Liste des biens ('.count($count).')</h1><br/>';



        echo '<table class="table table-stripped">
                    <tr><a href="biens.php"><span class="label label-default">Tout afficher</a></span></a>
       <a href="biens.php?transaction=LOC"><span class="label label-primary">Location</span></a>
        <a href="biens.php?transaction=VEN"><span class="label label-primary">Vente</span></a>
       <a href="biens.php?type=APP"> <span class="label label-info">Appartement</span></a>
       <a href="biens.php?type=BUR"><span class="label label-info">Bureau</span></a>
        <a href="biens.php?type=FND"><span class="label label-info">Fonds de commerce</span></a>
       <a href="biens.php?type=MAI"> <span class="label label-info">Maison</span></a>
      <a href="biens.php?type=TER"> <span class="label label-info">Terrain</span></a>
       </tr>
                    <tr>
                        <th>Adresse</th>
                        <th>Code Postal</th>
                        <th>Ville</th>
                        <th>Pièces</th>
                        <th>Transaction</th>
                        <th>Type de bien</th>
                        <th>Montant</th>
                        </tr>';
        foreach ($biens2 as $bie){
            echo "<tr>";
            echo "<td>".$bie['adresse1']." ".$bie['adresse2']."</td><td>".$bie['codepostal']."</td><td>".$bie['nomville']."</td>";
            if ($bie['pieces'] <= 2){
                echo "<td><span class=\"label label-default\">".$bie['pieces']."</span></td>";
            }else{
                echo "<td><span class=\"label label-success\">".$bie['pieces']."</span></td>";
            }
            echo "<td>".$bie['intituletransaction']."</td><td>".$bie['intitulebien']."</td><td>".$bie['montant']."</td>";
            echo "</tr>";
        }
        echo '</table>';

        //pagination
        echo '<nav aria-label="Page navigation">
  <ul class="pagination">';
        if (count($count)> 10){//Si il y a plus de 10 row affiche des liens pour les nuémros de pages en fonction des filtres
            for ($i = 1; $i < count($count)/10+1; $i++){
                if (isset($_GET['transaction'])) {
                    echo '  <li><a href="biens.php?transaction=' . $_GET['transaction'] . '&page=' . $i . '">' . $i . '</a></li>';
                }elseif (isset($_GET['type'])){
                    echo '  <li><a href="biens.php?type='.$_GET['type'].'&page=' . $i . '">' . $i . '</a></li>';
                }else{
                    echo '  <li><a href="biens.php?page=' . $i . '">' . $i . '</a></li>';
                }
            }

            echo '  </ul></nav>';
        }

        ?>
</div>
</body>
</html>