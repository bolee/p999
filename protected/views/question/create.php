<?php
$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Question','url'=>array('index')),
	array('label'=>'Manage Question','url'=>array('admin')),
);
?>

<h1>创建新问题</h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'question-form',
    'enableAjaxValidation'=>false,
)); ?>


<?php echo $form->errorSummary(array($model,$tag)); ?>

<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>256)); ?>

<?php echo $form->textAreaRow($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<?php echo $form->textFieldRow($tag,'name',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
    'buttonType'=>'submit',
    'type'=>'primary',
    'label'=>$model->isNewRecord ? 'Create' : 'Save',
)); ?>
</div>

<?php $this->endWidget(); ?>
