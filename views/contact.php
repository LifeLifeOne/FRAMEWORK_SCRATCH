<h3 class="text-grey text-center ">Contact Us</h3>

<?php $form = \App\core\form\Form::begin('', "post") ?>

<?php echo $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'message') ?>

<br>
<div class="d-flex justify-content-center m-2">
    <button type="submit" class="btn btn-warning m-1">Send</button>
</div>

<?php echo \app\core\form\Form::end() ?>
