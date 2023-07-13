<!DOCTYPE html>
<html>

<head>
    <title>Gestion des contacts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Gestion des contacts</h1>

        <form method="POST" action="ajouter.php">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="telephone">Numéro de téléphone :</label>
                <input type="text" class="form-control" id="telephone" name="telephone" required>
            </div>
            <div class="form-group">
                <label for="email">Adresse e-mail :</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

        <table class="table mt-4">
            <thead class="thead-light">
                <tr>
                    <th>Nom</th>
                    <th>Numéro de téléphone</th>
                    <th>Adresse e-mail</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'afficher.php'; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    
</body>

</html>

