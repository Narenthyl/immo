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
<?php include 'navbar.php';
include 'configuration.php';
include 'pdo.php';
if (isset($_GET['page'])){
    $page = $_GET['page'] - 1;
    $proprietaires2 = selectProprietairesPage(10, $page*10);
}else{
    $proprietaires2 = $proprietaires;
}
?>
<div class="container"> <!-- Contient toute la page -->
    <?php
    echo '<h1>Liste des propriétaires ('.count($proprietaires2).')</h1><br/>';
    echo '<table class="table table-stripped">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Titre</th>
                        <th>Mobile</th>
                        <th>Téléphone perso.</th>
                        </tr>';
    foreach ($proprietaires2 as $pro) {
        echo "<tr>";
        echo '<td><a href="ficheproprietaire.php?id=' . $pro['numeroproprietaire'] . '">' . $pro['nomproprietaire'] . '</a></td><td>' . $pro['prenomproprietaire'] . '</td><td>' . $pro['titre'] . '</td><td>' . $pro['telephonemobile'] . '</td><td>' . $pro['telephonepersonnel'] . '</td>';
        echo "</tr>";
    }
    echo '</table>';
    //pagination
    echo '<nav aria-label="Page navigation">
  <ul class="pagination">';
    for ($i = 1; $i < count($proprietaires)/10+1; $i++){
        echo '  <li><a href="proprietaires.php?page=' . $i . '">' . $i . '</a></li>';
        }

    echo '  </ul>
</nav>';
    ?>
</div>
</body>
</html>