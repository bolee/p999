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
                praise
            </div>
            <div class="post-cell-nouse" title="<?php echo $model->nouse; ?>">
                Step
            </div>
            <div class="post-cell-supply" title="Supply" id="question-<?php echo $model->id; ?>">
                Supply
            </div>
        </div>
        <div class="post-main">
            <div class="post-author">
                <span><a href="<?php echo Yii::app()->createUrl('/user/view',array('display'=>$model->user->display)) ?>"> <?php echo $model->user->display; ?></a> publish <?php echo $model->date; ?></span>
            </div>
            <div class="well">
                <?php echo $model->content;?>
            </div>
            <ul class="post-supply-ul">
                <?php
                foreach($model->supply as $svalue)
                {
                    ?>
                    <li>
                        &nbsp;
                        <?php  echo $svalue->content ?>
                        &nbsp;  <a href="<?php echo Yii::app()->createUrl('/user/view',array('display'=>$svalue->user->display)) ?>"><?php echo $svalue->user->display ?></a>
                        <?php echo $svalue->date ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <div class="tag">
                <?php
                    if(!empty($model->tags))
                    {
                        foreach(explode(',',$model->tags) as $value)
                        {
                            ?>
                            <a class="label" href="<?php echo Yii::app()->createUrl('/question/tag',array('tag'=>$value)) ?>"><?php echo $value ?></a>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="post-comment span10">
        <?php foreach($answerData as $value) { ?>
            <div class="post-cell">
                <div class="post-cell-useful">
                    <span><?php echo $model->useful; ?></span>
                    Praise
                </div>
                <div class="post-cell-nouse" title="<?php echo $model->nouse; ?>">
                    Step
                </div>
                <div class="post-cell-supply" title="Supply" id="comment-<?php echo $value->id; ?>">
                    Supply
                </div>
            </div>
            <div class="post-main">
                <div class="post-author">
                    <span><a href="<?php echo Yii::app()->createUrl('/user/view',array('display'=>$value->user->display)) ?>"> <?php echo $value->user->display; ?></a> publish <?php echo $value->date; ?></span>
                </div>
                <div class="well">
                    <?php
                        echo $value->content;
                    ?>
                </div>
                <ul class="post-supply-ul">
                    <?php
                        foreach($value->supply as $svalue)
                        {
                    ?>
                            <li>
                                <?php  echo $svalue->content ?>
                                &nbsp;<a href="<?php echo Yii::app()->createUrl('/user/'.$value->user->display) ?>"><?php echo $value->user->display ?></a> :
                                <?php echo $value->date ?>
                            </li>
                    <?php
                        }
                    ?>
                </ul>
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
                'class'=>'span9',
            )
        )); ?>
        <?php echo $form->errorSummary(array($answer)); ?>
        <?php echo $form->labelEx($answer,'content') ?>
        <?php echo $form->textArea($answer,'content',array('id'=>'editor','style'=>'width:700px')) ?>
        <div class="post-submit">
            <?php echo CHtml::submitButton('Post Answer'); ?>
        </div>

        <?php $this->endWidget(); ?>
    <?php } ?>
</div>
<!--左边结束-->
<!--右边开始-->
<div class="right span2">
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="">相关问题</a> </li>
            <li><a href="">相关问题</a> </li>
            <li><a href="">相关问题</a> </li>
            <li><a href="">相关问题</a> </li>
            <li><a href="">相关问题</a> </li>
            <li><a href="">相关问题</a> </li>
            <li><a href="">相关问题</a> </li>
            <li><a href="">相关问题</a> </li>
            <li><a href="">相关问题</a> </li>
            <li><a href="">相关问题</a> </li>
            <li><a href="">相关问题</a> </li>
            <li><a href="">相关问题</a> </li>
            <li><a href="">相关问题</a> </li>
            <li><a href="">相关问题</a> </li>
            <li><a href="">相关问题</a> </li>
            <li><a href="">相关问题</a> </li>
        </ul>
</div>
<!--右边结束-->
















