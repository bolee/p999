<?php
$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->title,
);
$this->pageTitle = $model->title .' - '. Yii::app()->name;
?>

<h1><?php echo $model->title; ?></h1>
<hr />
    <div class="span8">
        <div class="well">
            <?php echo $model->content;?>
            <p>
                <span class="label label-info">tag</span>
                <span class="label label-info">tag</span>
                <span class="label label-info">tag</span>
            </p>
        </div>
    </div>
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
        </ul>
    </div>