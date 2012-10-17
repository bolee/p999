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
    <div class="post-question span10">
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
    </div>
    <hr class="post-hr"/>
    <div class="post-comment span10">
        <?php foreach($model->answer as $value) { ?>
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
                <?php echo $value->content;?>
                <div class="post-author">
                    <span><?php echo $model->user->display; ?> 发表于 <?php echo $model->date; ?></span>
                </div>
            </div>
            <hr class="post-comment-clear" />
        <?php } ?>
    </div>
    <?php if(isset(Yii::app()->user->id)) { ?>
        <?php
        $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
            'id'=>'question-answer',
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array(
                'class'=>'span10'
            )
        )); ?>
        <?php echo $form->errorSummary(array($answer)); ?>
        <?php echo $form->labelEx($answer,'content') ?>
        <?php echo $form->textArea($answer,'content',array('id'=>'editor')) ?>
        <div class="post-submit">
            <?php echo CHtml::submitButton('添加答案'); ?>
        </div>

        <?php $this->endWidget(); ?>
    <?php } ?>
</div>
<!--左边结束-->
<!--右边开始-->
<div class="right span2">
    <div class="span2">
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
















