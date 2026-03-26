<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Books' ?></title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

<div class="bg-neutral-200 min-h-screen p-6">
    <div class="max-w-2xl mx-auto rounded-xl bg-white p-6">
        <h1 class="text-2xl font-semibold mb-4">Authors</h1>
        <?= $this->renderSection('content') ?>
    </div>
</div>

</body>
</html>