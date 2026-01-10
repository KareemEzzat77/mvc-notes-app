<div class="card shadow-sm">
    <div class="card-body">

        <h3 class="card-title mb-3">
            <?= htmlspecialchars($note['title']) ?>
        </h3>

        <p class="card-text">
            <?= nl2br(htmlspecialchars($note['body'])) ?>
        </p>

        <div class="d-flex justify-content-end gap-2 mt-4">

            <a href="<?= BASE_URL ?>note/<?= $note['id'] ?>/edit"
                class="btn btn-outline-primary">
                Edit
            </a>

            <form method="POST"
                action="<?= BASE_URL ?>note/<?= $note['id'] ?>/delete"
                onsubmit="return confirm('Delete this note?')">

                <button class="btn btn-outline-danger">
                    Delete
                </button>
            </form>

        </div>
    </div>
</div>