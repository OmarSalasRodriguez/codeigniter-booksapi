<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div>
    <?php if (session('message')): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            <?= esc(session('message')) ?>
        </div>
    <?php endif; ?>

    <?php if (session('errors')): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <?php foreach (session('errors') as $error): ?>
                <p><?= esc($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <a href="<?= site_url('authors/new') ?>" class="bg-green-500 text-white p-2 px-4 rounded inline-block mb-4 hover:bg-green-600">
        Create New Author
    </a>
    
    <ul class="flex flex-col gap-4">
        <?php foreach (($authors ?? []) as $author): ?>
            <li class="flex bg-neutral-200 rounded p-4 justify-between items-center gap-2">
                <p>
                    <?= esc($author['id']) ?> <?= esc($author['name']) ?>
                </p>


                <div class="flex gap-2">
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

            </li>
        <?php endforeach; ?>
    </ul>
</div>


<?= $this->endSection() ?>
