<h2 class="mb-4 text-center">Login</h2>

<form method="POST" action="<?= BASE_URL ?>auth/login" class="card p-4 shadow-sm mx-auto" style="max-width: 400px;">

    <!-- Email -->
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input
            type="email"
            name="email"
            class="form-control <?= !empty($errors['email']) ? 'is-invalid' : '' ?>"
            value="<?= htmlspecialchars($old['email'] ?? '') ?>">

        <?php if (!empty($errors['email'])): ?>
            <div class="invalid-feedback">
                <?= $errors['email'][0] ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input
            type="password"
            name="password"
            class="form-control <?= !empty($errors['password']) ? 'is-invalid' : '' ?>">

        <?php if (!empty($errors['password'])): ?>
            <div class="invalid-feedback">
                <?= $errors['password'][0] ?>
            </div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary w-100">
        Login
    </button>
</form>

<p class="text-center mt-3">
    Don't have an account?
    <a href="<?= BASE_URL ?>auth/register">Register</a>
</p>