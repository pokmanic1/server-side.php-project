<?php
    function afiseazaEroare(string $mesaj)
    {
        http_response_code(400);
        $mesajSigur = htmlspecialchars($mesaj, ENT_QUOTES, 'UTF-8');
        ?>
        <!DOCTYPE html>
        <html lang="ro">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Eroare la încărcare</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
        </head>
        <body class="flex min-h-screen items-center justify-center bg-gray-100 px-4 py-6 text-gray-900">
            <main class="w-full max-w-md rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
                <h1 class="text-xl font-bold">PDF-ul nu a putut fi încărcat</h1>
                <p class="mt-2 text-sm text-gray-600"><?= $mesajSigur; ?></p>
                <a href="index.php" class="mt-4 inline-block rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Înapoi la listă
                </a>
            </main>
        </body>
        </html>
        <?php
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_FILES['file'])) {
            if (!is_dir('uploads')) {
                mkdir('uploads');
            }
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_tmp = $_FILES['file']['tmp_name'];
            
            $file_ext = strtolower(pathinfo(basename($file_name), PATHINFO_EXTENSION));

            if ($file_ext !== "pdf") {
                afiseazaEroare("Selectați un fișier în format PDF.");
            }

            if ($file_size > 2 * 1024 * 1024) {
                afiseazaEroare("PDF-ul depășește dimensiunea maximă admisă de 2 MB.");
            }

            $patch = "uploads/" . uniqid('doc_', true) . ".pdf";
            if (!move_uploaded_file($file_tmp, $patch)) {
                afiseazaEroare("A apărut o eroare la încărcarea PDF-ului. Încercați din nou.");
            }
            header('location:index.php');
            exit;
        }
    }
?>