<?php
$this->pageTitle = 'Register';
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'user-form',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    )

));
?>

<p class="help-block">User Login.</p>

<?php echo $form->errorSummary($user); ?>
<?php if(!empty($error)) { ?>
<div class="alert alert-block alert-error" id="user-form_es_" style=""><p>Please correct the following input errors:</p>
    <ul><li><?php echo $error ?></li></ul></div>
<?php } ?>
<?php echo $form->textFieldRow($user,'email',array('class'=>'span5','maxlength'=>32)); ?>

<?php echo $form->passwordFieldRow($user,'password',array('class'=>'span5','maxlength'=>32)); ?>

<?php echo $form->checkBoxRow($user,'rememberMe'); ?>
<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
    'buttonType'=>'submit',
    'type'=>'primary',
    'label'=>'Login',
)); ?>
</div>

<?php $this->endWidget(); ?>
