<h2 class="mb-4">Your Notes</h2>

<a href="<?= BASE_URL ?>note/add" class="btn btn-primary mb-4">
    + New Note
</a>

<?php if (empty($notes)): ?>
    <div class="alert alert-info">
        No notes yet.
    </div>
<?php else: ?>
    <div class="row g-4">
        <?php foreach ($notes as $note): ?>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= htmlspecialchars($note['title']) ?>
                        </h5>

                        <p class="card-text text-muted">
                            <?= nl2br(htmlspecialchars(substr($note['body'], 0, 120))) ?>...
                        </p>
                    </div>

                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <div>
                            <a href="<?= BASE_URL ?>note/<?= $note['id'] ?>"
                                class="btn btn-sm btn-outline-secondary">
                                View
                            </a>

                            <a href="<?= BASE_URL ?>note/<?= $note['id'] ?>/edit"
                                class="btn btn-sm btn-outline-primary">
                                Edit
                            </a>
                        </div>

                        <form method="POST"
                            action="<?= BASE_URL ?>note/<?= $note['id'] ?>/delete"
                            onsubmit="return confirm('Delete this note?')">
                            <button class="btn btn-sm btn-outline-danger">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>