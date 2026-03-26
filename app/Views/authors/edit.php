<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="">
    <a href="<?= site_url('authors') ?>" class="text-blue-500 mb-4 inline-block">&larr; Back</a>

    <form action="<?= site_url('/authors/' . $id ?? '') ?>" method="post" class="flex flex-col gap-2">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        <div>
            <label for="name" class="block">Name</label>
            <input type="text" id="name" name="name" value="<?= esc($author['name'] ?? '') ?>" class="border p-2 w-full rounded">
        </div>

        <button class="bg-blue-300 text-white p-2 rounded" type="submit">Update</button>
    </form>
</div>

<?= $this->endSection() ?>
