<?php
$folder = 'documente/';

if (isset($_GET['file'])) {
    $fisier = $_GET['file'];
    $cale = $folder . $fisier;

    if (file_exists($cale)) {
        unlink($cale);
        header('Location: index.php?mesaj=Fișierul a fost șters!');
        exit;
    }
}

header('Location: index.php');
exit;