<h3>Login</h3>
<?php $form = \App\core\form\Form::begin('', "post") ?>

<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>

<br>
<button type="submit" class="btn btn-primary">Login</button>

<?php echo \app\core\form\Form::end() ?>
