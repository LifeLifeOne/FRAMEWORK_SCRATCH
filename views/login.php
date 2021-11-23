<h3 class="text-grey text-center ">Login</h3>
<?php $form = \App\core\form\Form::begin('', "post") ?>

<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>

<br>
<div class="d-flex justify-content-center m-2">

    <button type="submit" class="btn btn-warning m-1">Register</button>

    <button type="submit" class="btn btn-warning m-1">Login</button>

    <a href="/"  class="btn btn-danger m-1">Cancel</a>
</div>
<?php echo \app\core\form\Form::end() ?>
