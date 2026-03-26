<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div>
    <a href="<?= site_url('authors') ?>" class="text-blue-500 mb-4 inline-block">&larr; Back</a>

    <div class="bg-neutral-200 rounded p-4 mb-4">
        <h2 class="text-xl font-bold mb-2"><?= esc($author['name']) ?></h2>
        <p class="text-gray-600">ID: <?= esc($author['id']) ?></p>
        
        <div class="flex gap-2 mt-4">
            <a class="bg-blue-300 text-white p-2 px-4 rounded" href="<?= site_url('/authors/edit/' . $author['id']) ?>">
                Edit
            </a>
            <form action="<?= site_url('/authors/delete/' . $author['id']) ?>" method="POST">
                <?= csrf_field() ?>
                <button type="submit" class="bg-red-300 text-white p-2 px-4 rounded cursor-pointer" onclick="return confirm('Delete this author?')">
                    Delete
                </button>
            </form>
        </div>
    </div>

    <h3 class="text-lg font-bold mb-2">Books by this author:</h3>
    <?php if (!empty($books)): ?>
        <ul class="flex flex-col gap-2">
            <?php foreach ($books as $book): ?>
                <li class="bg-neutral-200 rounded p-3">
                    <?= esc($book['title']) ?> (<?= esc($book['year']) ?>)
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="text-gray-500">No books found for this author.</p>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
