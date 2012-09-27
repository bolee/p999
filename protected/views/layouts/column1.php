<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
</head>

<body>
<div class="container">
    <?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'inverse', // null or 'inverse'
    'brand'=>Yii::app()->name,
    'brandUrl'=>Yii::app()->homeUrl,
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'首页', 'url'=>'#', 'active'=>true),
            ),
        ),
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'待解决', 'url'=>'#'),
                array('label'=>'登陆', 'url'=>Yii::app()->createUrl('/user/login'),'visible'=>Yii::app()->user->isGuest),
                array('label'=>'注册', 'url'=>Yii::app()->createUrl('/user/reg'),'visible'=>Yii::app()->user->isGuest),
                '---',
                array('label'=>'个人中心', 'url'=>'#','visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                    array('label'=>'登陆', 'url'=>Yii::app()->createUrl('/user/login')),
                    array('label'=>'注册', 'url'=>Yii::app()->createUrl('/user/reg')),
                )),
            ),
        ),
        '<form class="navbar-search pull-left" action=""><input type="text" class="search-query span4" placeholder="搜索问题"></form>',
    ),
)); ?>
    <div class="clear_top"></div>
    <?php echo $content;?>
</div>
</body>
</html>
