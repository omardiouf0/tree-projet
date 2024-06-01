<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" 
    content="width=device-width, initial-scale=1.0">
    <title>Data</title>
</head>
<body>
    
    <?php
        if((!isset($_POST['email'])|| !filter_var($_POST['email'],
        FILTER_VALIDATE_EMAIL)||empty($_POST['message'])|| trim($_POST['message'])===''))
    
        {
            echo"Il faut un email et messages valides pour envoyer le formulaire.";
            return ;
        }
        
        if((empty($_POST['nom'])|| trim($_POST['nom'])==='')||
        empty($_POST['passe'])|| trim($_POST['passe'])==='')
        {
            echo"Il faut un passeword et un nom valides pour soumettre le formulaire";
        
            return ;
        }

    ?>
    <?php
        if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] === 0) {
    
            // Testons, si le fichier est trop volumineux
            if ($_FILES['screenshot']['size'] > 1000000) {
                echo "L'envoi n'a pas pu être effectué, erreur ou image trop volumineuse";
                return;
            }
        
            $fileInfo = pathinfo($_FILES['screenshot']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
            if (!in_array($extension, $allowedExtensions)) {
                    echo "L'envoi n'a pas pu être effectué, l'extension {$extension} n'est pas autorisée";
                    return;
            }
                $fileInfo = pathinfo($_FILES['screenshot']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png',];
                if (!in_array($extension, $allowedExtensions)) {
                echo "L'envoi n'a pas pu être effectué, l'extension {$extension} n'est pas autorisée";
                return;
            }
            // Testons, si le dossier uploads est manquant
            $path = __DIR__ . '/uploads/';
            if (!is_dir($path)) {
                echo "L'envoi n'a pas pu être effectué, le dossier uploads est manquant";
                return;
            }
            // On peut valider le fichier et le stocker définitivement
            if(!move_uploaded_file($_FILES['screenshot']['tmp_name'], $path . basename($_FILES['screenshot']['name']))) 
            {
                echo"erreur d'enregistrement";
                return;
            }
        }else{
            echo "Ajouter une image c'est obligatoire";
            return;
        }

    ?>
    <h1>Messsage bien reçue</h1>
    <div>
        <h5>Rappel de vos infoormations</h5>
            <p><b>Nom</b>:<?php echo htmlspecialchars( $_POST['nom']);?></p>
            <p><b>Email</b>:<?php echo $_POST['email'];?></p>
            <p><b>Message</b>:<?php echo htmlspecialchars( $_POST['message']);?></p>
            <p><b>Passeword</b>:<?php echo htmlspecialchars($_POST['passe']);?></p>
            <p><b>fichier</b>:<?php echo $_FILES['screenshot']['name'];?></p>
            <p>Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s'); ?>
    </div>
</body>
</html>