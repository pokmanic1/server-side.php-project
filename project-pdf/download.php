<?php
$folder = 'documente/';

if (isset($_GET['file'])) {
    $fisier = $_GET['file'];
    $cale = $folder . $fisier;

    if (file_exists($cale)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $fisier . '"');
        readfile($cale);
        exit;
    }
}

header('Location: index.php');
exit;