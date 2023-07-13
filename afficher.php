<?php
// Connexion à la base de données
$connection = mysqli_connect("localhost", "root", "", "gestion_de_contacts");

// Vérification de la connexion
if (!$connection) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Récupérer les contacts depuis la base de données
$requete = "SELECT * FROM contacts";
$resultat = mysqli_query($connection, $requete);

// Afficher les contacts dans le tableau
while ($contact = mysqli_fetch_assoc($resultat)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($contact['nom']) . "</td>";
    echo "<td>" . htmlspecialchars($contact['telephone']) . "</td>";
    echo "<td>" . htmlspecialchars($contact['email']) . "</td>";
    echo "<td>";
    echo "<a href='modifier.php?id=" . $contact['id'] . "'>Modifier</a>";
    echo "<a href='supprimer.php?id=" . $contact['id'] . "'>Supprimer</a>";
    echo "</td>";
    echo "</tr>";
}

// Fermer la connexion à la base de données
mysqli_close($connection);
?>

