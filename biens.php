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
    <?php include 'navbar.php';include 'configuration.php'; include 'pdo.php'; ?>
    <div class="container"> <!-- Contient toute la page -->
        <?php
        echo '<h1>Liste des biens ('.$nbbiens['count'].')</h1><br/>';
        echo '<table class="table table-stripped">
                    <tr>
                        <th>Adresse</th>
                        <th>Code Postal</th>
                        <th>Ville</th>
                        <th>Pièces</th>
                        <th>Transaction</th>
                        <th>Type de bien</th>
                        <th>Montant</th>
                        </tr>';
        foreach ($biens as $bie){
            echo "<tr>";
            echo "<td>".$bie['adresse1'].' '.$bie['adresse2']."</td><td>".$bie['codepostal']."</td><td>".$bie['nomville']."</td>";
            if ($bie['pieces'] <= 2){
                echo "<td><span class=\"label label-default\">".$bie['pieces']."</span></td>";
            }else{
                echo "<td><span class=\"label label-success\">".$bie['pieces']."</span></td>";
            }
            echo "<td>".$bie['intituletransaction']."</td><td>".$bie['intitulebien']."</td><td>".$bie['montant']."</td>";
            echo "</tr>";
        }
        echo '</table>';
        ?>
</div>
</body>
</html>