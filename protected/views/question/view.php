<?php
$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->title,
);
$this->pageTitle = $model->title .' - '. Yii::app()->name;
?>
<!--标题-->
<h1><?php echo $model->title; ?></h1>
<!--左边-->
<div class="left">
    <!--内容左边-->
    <div class="post-cell">
        <div class="post-cell-useful">
            <span><?php echo $model->useful; ?></span>
            赞
        </div>
        <div class="post-cell-nouse" title="<?php echo $model->nouse; ?>">
            踩
        </div>
    </div>
    <div class="post-main">
        <?php echo $model->content;?>
        <div class="post-author">
            <span><?php echo $model->user->display; ?> 发表于 <?php echo $model->date; ?></span>
        </div>
    </div>
    <div class="post-comment">
        <?php
            $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
            'id'=>'question-answer',
            'enableAjaxValidation'=>true,
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            )
    )); ?>
        <?php echo $form->errorSummary(array($answer)); ?>
        <?php echo $form->labelEx($answer,'content') ?>
        <?php echo $form->textArea($answer,'content') ?>
        <script language="javascript" type="text/javascript">  <!-- UEditor -->
        var editor = new baidu.editor.ui.Editor(); <!--new一个对象，通过对象创建编辑器-->
        editor.render("Answer_content");<!--出入参数editor为textarea中的id值，并生成编辑器-->

        </script>
        <?php $this->endWidget(); ?>
    </div>
</div>
<!--左边结束-->
<!--右边开始-->
<div class="right">
    <div class="span3">
        <ul class="thumbnails pull-right">
            <li class="span2">
                <?php echo CHtml::link($model->user->display,Yii::app()->createUrl('/user/'.$model->user->id),
                array(
                    'rel'=>'tooltip',
                    'date-title'=>'Tooltip',
                    'class'=>'thumbnail',
                ))?>
            </li>
            <p>
                <span class="label label-info">tag</span>
                <span class="label label-info">tag</span>
                <span class="label label-info">tag</span>
            </p>
        </ul>
    </div>
</div>
<!--右边结束-->
















