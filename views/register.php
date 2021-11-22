<h3>Register</h3>
<?php $form = \App\core\form\Form::begin('', "post") ?>

<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>
<?php echo $form->field($model, 'confirmPassword')->passwordField() ?>

<br>
<button type="submit" class="btn btn-primary">Register</button>
<br>
<a href="/login">already signUp ?</a>

<?php echo \app\core\form\Form::end() ?>
