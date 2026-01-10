<h2 class="mb-4">Edit Note</h2>

<form method="POST"
    action="<?= BASE_URL ?>note/<?= $note['id'] ?>/edit"
    class="card p-4 shadow-sm">

    <!-- Title -->
    <div class="mb-3">
        <label class="form-label">Title</label>

        <input
            type="text"
            name="title"
            class="form-control <?= !empty($errors['title']) ? 'is-invalid' : '' ?>"
            value="<?= htmlspecialchars($old['title'] ?? $note['title']) ?>">

        <?php if (!empty($errors['title'])): ?>
            <div class="invalid-feedback">
                <?= $errors['title'][0] ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Body -->
    <div class="mb-3">
        <label class="form-label">Body</label>

        <textarea
            name="body"
            rows="6"
            class="form-control <?= !empty($errors['body']) ? 'is-invalid' : '' ?>"><?= htmlspecialchars($old['body'] ?? $note['body']) ?></textarea>

        <?php if (!empty($errors['body'])): ?>
            <div class="invalid-feedback">
                <?= $errors['body'][0] ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="d-flex justify-content-end gap-2">
        <a href="<?= BASE_URL ?>note/<?= $note['id'] ?>"
            class="btn btn-secondary">
            Cancel
        </a>

        <button type="submit" class="btn btn-primary">
            Update Note
        </button>
    </div>
</form>