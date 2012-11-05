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

<p class="help-block">Register.</p>

<?php echo $form->errorSummary($user); ?>

<?php echo $form->textFieldRow($user,'display',array('class'=>'span5','maxlength'=>32)); ?>

<?php echo $form->textFieldRow($user,'email',array('class'=>'span5','maxlength'=>32)); ?>

<?php echo $form->passwordFieldRow($user,'password',array('class'=>'span5','maxlength'=>32)); ?>

<?php echo $form->passwordFieldRow($user,'password2',array('class'=>'span5','maxlength'=>32)); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
    'buttonType'=>'submit',
    'type'=>'primary',
    'label'=>'Register',
)); ?>
</div>

<?php $this->endWidget(); ?>
