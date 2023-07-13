<?php
// Connexion à la base de données
$connection = mysqli_connect("localhost", "root", "", "gestion_de_contacts");

// Vérification de la connexion
if (!$connection) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
  }

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];

    // Échapper les caractères spéciaux pour éviter les injections SQL
    $nom = mysqli_real_escape_string($connection, $nom);
    $telephone = mysqli_real_escape_string($connection, $telephone);
    $email = mysqli_real_escape_string($connection, $email);

    // Insérer les données dans la base de données
    $requete = "INSERT INTO contacts (nom, telephone, email) VALUES ('$nom', '$telephone', '$email')";
    $resultat = mysqli_query($connection, $requete);

    if ($resultat) {
        // Rediriger vers la page principale après l'ajout
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur lors de l'ajout du contact : " . mysqli_error($connection);
    }
}

// Fermer la connexion à la base de données
mysqli_close($connection);
?>

