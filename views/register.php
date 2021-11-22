<h3>Register</h3>
<form action="" method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email"
               value="<?= $model->email ?>"
               class="form-control <?= $model->hasError('email') ? 'is-invalid' : '' ?>"
               name="email"
               id="email">
        <div class="invalid-feedback">
            <?= $model->getFirstError('email') ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm password</label>
        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
    <br>
    <a href="/login">already signUp ?</a>
</form>