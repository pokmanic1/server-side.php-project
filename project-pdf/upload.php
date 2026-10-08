<?php
$folder = 'documente/';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fisier'])) {
    $numeFisier = $_FILES['fisier']['name'];
    $caleTemporara = $_FILES['fisier']['tmp_name'];

    $extensie = pathinfo($numeFisier, PATHINFO_EXTENSION);

    if (strtolower($extensie) === 'pdf') {
        move_uploaded_file($caleTemporara, $folder . $numeFisier);
        header('Location: index.php?mesaj=Fișierul a fost încărcat!');
        exit;
    } else {
        header('Location: index.php?mesaj=Doar fișierele PDF sunt permise!');
        exit;
    }
}

header('Location: index.php');
exit;