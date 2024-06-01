<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" 
    content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h2>Formulaire d'enregistrement</h2>
    <form action="data.php" method="post" enctype="multipart/form-data">
        <label for="Nom">Nom:</label>
        <input type="text"name="nom"id="Nom">
        </br> </br>
        <label for="email">E-mail</label>
        <input type="email"name="email"id="email">
        </br> </br>
        <label for="pseudo">Mot de passe:</label>
        <input type="password"name="passe"id="pseudo">
        </br> </br>
        <label for="Message">Message:</label>
        <textarea placeholder="Exprimez ici" name="message" ></textarea>
        </br> </br>
        <label>joindre</label>
        <input type="file"name="screenshot">
        </br> </br>
        <input type="submit" value="VALIDER">

    </form>
    
</body>
</html>