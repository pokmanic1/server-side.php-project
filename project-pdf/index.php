<?php
$folder = 'documente/';

if (!is_dir($folder)) {
    mkdir($folder);
}

$toateFisierele = scandir($folder);
$cauta = isset($_GET['cauta']) ? $_GET['cauta'] : '';
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Manager Documente PDF</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8 font-sans">

    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Manager Documente PDF</h1>

        <?php if (isset($_GET['mesaj'])): ?>
            <div class="p-3 mb-4 bg-blue-100 text-blue-700 rounded">
                <?php echo htmlspecialchars($_GET['mesaj']); ?>
            </div>
        <?php endif; ?>

        <form action="/project-pdf/upload.php" method="POST" enctype="multipart/form-data" class="mb-6 flex gap-2">
<input type="file" name="fisier" accept=".pdf" required class="border p-2 rounded w-full">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Încarcă</button>
        </form>

        <form action="index.php" method="GET" class="mb-6 flex gap-2">
            <input type="text" name="cauta" placeholder="Caută un fișier..." value="<?php echo htmlspecialchars($cauta); ?>" class="border p-2 rounded w-full">
            <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded">Caută</button>
            <a href="index.php" class="bg-gray-300 text-black px-4 py-2 rounded">Reset</a>
        </form>

        <table class="w-full border-collapse border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2 text-left">Nume Fișier</th>
                    <th class="border p-2 text-right">Acțiuni</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($toateFisierele as $fisier) {
                    if ($fisier == '.' || $fisier == '..') {
                        continue;
                    }

                    if ($cauta !== '' && stripos($fisier, $cauta) === false) {
                        continue;
                    }
                ?>
                    <tr>
                        <td class="border p-2"><?php echo $fisier; ?></td>
                        <td class="border p-2 text-right space-x-2">
                            <a href="download.php?file=<?php echo urlencode($fisier); ?>" class="text-blue-600 underline">Descarcă</a>
                            <a href="delete.php?file=<?php echo urlencode($fisier); ?>" onclick="return confirm('Ștergi fișierul?')" class="text-red-600 underline">Șterge</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>