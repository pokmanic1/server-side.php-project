<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manager PDF</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gray-50 text-gray-900">

    <!-- Header -->
    <header class="border-b bg-white">
        <div class="max-w-5xl mx-auto px-6 py-5">

            <h1 class="text-xl font-semibold">
                Manager PDF
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Gestionează documentele tale într-un singur loc.
            </p>

        </div>
    </header>


    <main class="max-w-5xl mx-auto px-6 py-10">

        <!-- Upload -->
        <section>

            <h2 class="text-2xl font-semibold">
                Încarcă un document
            </h2>

            <p class="text-gray-500 mt-1 mb-6">
                Selectează un fișier PDF pentru a-l adăuga.
            </p>


            <div class="bg-white border rounded-2xl p-6">

                <form
                    action="upload.php"
                    method="POST"
                    enctype="multipart/form-data"
                >

                    <label
                        for="pdf"
                        class="flex flex-col items-center justify-center
                               border-2 border-dashed border-gray-300
                               rounded-xl px-6 py-10
                               cursor-pointer
                               hover:bg-gray-50
                               hover:border-gray-400
                               transition"
                    >

                        <div class="text-3xl mb-3">
                            ↑
                        </div>

                        <span class="font-medium">
                            Selectează un fișier PDF
                        </span>

                        <span class="text-sm text-gray-500 mt-1">
                            Maximum 5 MB
                        </span>

                        <input
                            id="pdf"
                            type="file"
                            name="pdf"
                            accept=".pdf,application/pdf"
                            required
                            class="hidden"
                        >

                    </label>


                    <div class="flex justify-end mt-5">

                        <button
                            type="submit"
                            class="bg-gray-900 text-white
                                   px-5 py-2.5
                                   rounded-lg
                                   text-sm font-medium
                                   hover:bg-gray-700
                                   transition"
                        >
                            Încarcă PDF
                        </button>

                    </div>

                </form>

            </div>

        </section>


        <!-- Documents -->
        <section class="mt-10">

            <div class="flex items-center justify-between mb-4">

                <div>

                    <h2 class="text-xl font-semibold">
                        Documente încărcate
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        PDF-urile salvate în aplicație.
                    </p>

                </div>

            </div>


            <!-- Lista documentelor -->
            <div class="bg-white border rounded-2xl overflow-hidden">

                <!-- Exemplu document -->
                <div class="flex items-center justify-between
                            px-5 py-4
                            border-b">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-lg bg-gray-100
                                    flex items-center justify-center">

                            <span class="text-xs font-semibold text-gray-600">
                                PDF
                            </span>

                        </div>

                        <div>

                            <p class="text-sm font-medium">
                                document.pdf
                            </p>

                            <p class="text-xs text-gray-500">
                                1.2 MB · 08.10.2026
                            </p>

                        </div>

                    </div>


                    <div class="flex gap-2">

                        <button
                            class="text-sm px-3 py-1.5
                                   border rounded-lg
                                   hover:bg-gray-50"
                        >
                            Descarcă
                        </button>

                        <button
                            class="text-sm px-3 py-1.5
                                   text-red-600
                                   hover:bg-red-50
                                   rounded-lg"
                        >
                            Șterge
                        </button>

                    </div>

                </div>


                <!-- Empty state -->
                <!--
                <div class="px-6 py-12 text-center">

                    <p class="text-gray-500">
                        Nu există documente încărcate.
                    </p>

                </div>
                -->

            </div>

        </section>

    </main>


    <footer class="border-t bg-white mt-10">

        <div class="max-w-5xl mx-auto px-6 py-5">

            <p class="text-xs text-gray-400 text-center">
                Manager PDF
            </p>

        </div>

    </footer>

</body>

</html>