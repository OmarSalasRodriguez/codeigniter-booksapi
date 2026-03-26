<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="">

    <?php if (session('errors')): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <?php foreach (session('errors') as $error): ?>
                <p><?= esc($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <a href="<?= site_url('authors') ?>" class="text-blue-500 mb-4 inline-block">&larr; Back</a>

    <form action="<?= site_url('authors') ?>" method="post" class="flex flex-col gap-2">
        <?= csrf_field() ?>
        <div>
            <label for="name" class="block">Name</label>
            <input type="text" id="name" name="name" class="border p-2 w-full rounded" value="<?= old('name') ?>">
        </div>

        <button class="bg-blue-300 text-white p-2 rounded" type="submit">Create</button>
    </form>
</div>

<?= $this->endSection() ?>
