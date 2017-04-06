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
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}else{
    throw new Exception("Page Introuvable ! ");
}
$proprio = selectproprio($id); //resultset du proprio selectionné
$biens = selectbienproprio($id);
?>
<div class="container"> <!-- Contient toute la page -->
   <div class="row">
       <div class="col-md-4"> <!--Encart propriétaire-->
           <?php
                echo '<h1>Propriétaire</h1><br>';
                echo '<h2>'.$proprio['nomproprietaire'].' '.$proprio['prenomproprietaire'].'</h2><br/>';
                echo '<table class="table table-stripped">';
                echo '<tr><td>Nom</td><td>'.$proprio['nomproprietaire'].'</td></tr>';
                echo '<tr><td>Prénom</td><td>'.$proprio['prenomproprietaire'].'</td></tr>';
                echo '<tr><td>Téléphone Personnel</td><td>'.$proprio['telephonepersonnel'].'</td></tr>';
                echo '<tr><td>Téléphone Mobile</td><td>'.$proprio['telephonemobile'].'</td></tr>';
                echo '<tr><td>Email</td><td>'.$proprio['email'].'</td></tr>';
                echo '</table>';
           ?>
       </div>
       <div class="col-md-8"><!--Encart biens -->
           <?php
                echo '<h1>Liste des biens ('.count($biens).')</h1><br/>';
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
   </div>

</div>
</body>
</html>