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
            echo '<h1>Liste des propriétaires</h1><br/>';
            echo '<table class="table table-stripped">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Titre</th>
                        <th>Mobile</th>
                        <th>Téléphone perso.</th>
                        </tr>';
        foreach ($proprietaires as $pro){
            echo "<tr>";
            echo '<td><a href="ficheproprietaire.php?id='.$pro['numeroproprietaire'].'">'.$pro['nomproprietaire'].'</a></td><td>'.$pro['prenomproprietaire'].'</td><td>'.$pro['titre'].'</td><td>'.$pro['telephonemobile'].'</td><td>'.$pro['telephonepersonnel'].'</td>';
            echo "</tr>";
        }
        echo '</table>';
        ?>
    </div>
</body>
</html>