// Define constants for configurations
define('MAX_FILE_SIZE', 1000000); // 1 MB
define('UPLOAD_DIR', __DIR__ . '/uploads/');
define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'gif', 'png']);

if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] === UPLOAD_ERR_OK) {
    $fileSize = $_FILES['screenshot']['size'];
    $fileName = $_FILES['screenshot']['name'];
    $fileTmpName = $_FILES['screenshot']['tmp_name'];

    // Check file size
    if ($fileSize > MAX_FILE_SIZE) {
        echo "L'envoi n'a pas pu être effectué, image trop volumineuse";
        return;
    }

    // Validate file extension
    $fileInfo = pathinfo($fileName);
    $extension = strtolower($fileInfo['extension']); // Use strtolower for case-insensitive comparison
    if (!in_array($extension, ALLOWED_EXTENSIONS)) {
        echo "L'envoi n'a pas pu être effectué, l'extension {$extension} n'est pas autorisée";
        return;
    }

    // Validate MIME type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $fileTmpName);
    finfo_close($finfo);
    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($mimeType, $allowedMimeTypes)) {
        echo "L'envoi n'a pas pu être effectué, le type MIME {$mimeType} n'est pas autorisé";
        return;
    }
   $path = __DIR__ . '/uploads/';
   if (!is_dir($path)) {
       echo "L'envoi n'a pas pu être effectué, le dossier uploads est manquant";
       return;
   }
       if(!move_uploaded_file($_FILES['screenshot']['tmp_name'], $path . basename($_FILES['screenshot']['name'])));{
        echo"Erreur lors de l'uploads du fichier"; 
        return;
       }