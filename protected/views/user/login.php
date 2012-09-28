<?php
$this->pageTitle = '用户注册';
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'user-form',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    )

));
?>

<p class="help-block">用户登陆.</p>

<?php echo $form->errorSummary($user); ?>

<?php echo $form->textFieldRow($user,'email',array('class'=>'span5','maxlength'=>32)); ?>

<?php echo $form->passwordFieldRow($user,'password',array('class'=>'span5','maxlength'=>32)); ?>

<?php echo $form->checkBoxRow($user,'rememberMe'); ?>
<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
    'buttonType'=>'submit',
    'type'=>'primary',
    'label'=>'登陆',
)); ?>
</div>

<?php $this->endWidget(); ?>
