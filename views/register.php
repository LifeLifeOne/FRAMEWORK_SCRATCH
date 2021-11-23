<h3 class="text-grey text-center ">Register</h3>
<?php $form = \App\core\form\Form::begin('', "post") ?>

<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>
<?php echo $form->field($model, 'confirmPassword')->passwordField() ?>

<br>
<div class="d-flex justify-content-center m-2">
    <button type="submit" class="btn btn-warning m-1">Register</button>
    <a href="/login" class="btn btn-secondary m-1 " >Already signUp ?</a>
    <a href="/"  class="btn btn-danger m-1">Cancel</a>
</div>


<?php echo \app\core\form\Form::end() ?>
