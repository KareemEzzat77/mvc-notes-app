<h2 class="mb-4">Add New Note</h2>

<form method="POST" action="<?= BASE_URL ?>note/add" class="card p-4 shadow-sm">

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input
            type="text"
            name="title"
            class="form-control <?= !empty($errors['title']) ? 'is-invalid' : '' ?>"
            value="<?= htmlspecialchars($old['title'] ?? '') ?>">

        <?php if (!empty($errors['title'])): ?>
            <div class="invalid-feedback">
                <?= $errors['title'][0] ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Body</label>
        <textarea
            name="body"
            rows="6"
            class="form-control <?= !empty($errors['body']) ? 'is-invalid' : '' ?>"><?= htmlspecialchars($old['body'] ?? '') ?></textarea>

        <?php if (!empty($errors['body'])): ?>
            <div class="invalid-feedback">
                <?= $errors['body'][0] ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-success">
            Save Note
        </button>
    </div>
</form>