<?php
// Connexion à la base de données
$connection = mysqli_connect("localhost", "utilisateur", "root", "gestionnaire de contacts");

// Vérification de la connexion
if (!$connection) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Vérifier si un ID de contact est passé en paramètre dans l'URL
if (isset($_GET['id'])) {
    $contactId = $_GET['id'];

    // Récupérer les informations du contact à modifier
    $requete = "SELECT * FROM contacts WHERE id = '$contactId'";
    $resultat = mysqli_query($connection, $requete);
    $contact = mysqli_fetch_assoc($resultat);

    // Vérifier si le formulaire de modification est soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les nouvelles données du formulaire
        $nom = $_POST['nom'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];

        // Échapper les caractères spéciaux pour éviter les injections SQL
        $nom = mysqli_real_escape_string($connection, $nom);
        $telephone = mysqli_real_escape_string($connection, $telephone);
        $email = mysqli_real_escape_string($connection, $email);

        // Mettre à jour les données dans la base de données
        $requeteUpdate = "UPDATE contacts SET nom = '$nom', telephone = '$telephone', email = '$email' WHERE id = '$contactId'";
        $resultatUpdate = mysqli_query($connection, $requeteUpdate);

        if ($resultatUpdate) {
            // Rediriger vers la page principale après la modification
            header("Location: index.php");
            exit();
        } else {
            echo "Erreur lors de la modification du contact : " . mysqli_error($connection);
        }
    }

    // Fermer la connexion à la base de données
    mysqli_close($connection);
} else {
    // Rediriger vers la page principale si aucun ID de contact n'est spécifié
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>



