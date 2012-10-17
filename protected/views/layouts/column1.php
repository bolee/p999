<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <script charset="utf-8" src="<?php echo Yii::app()->baseUrl ?>/editor/kindeditor.js"></script>
    <script charset="utf-8" src="<?php echo Yii::app()->baseUrl ?>/editor/lang/zh_CN.js"></script>
    <script>
        var editor;
        KindEditor.ready(function(K) {
            editor = K.create('#editor');
        });
    </script>
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
                array('label'=>Yii::app()->user->name, 'url'=>'#','visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                    array('label'=>'新问题','url'=>Yii::app()->createUrl('/question/create')),
                    array('label'=>'退出', 'url'=>Yii::app()->createUrl('/user/logut')),
                )),
            ),
        ),
        '<form class="navbar-search pull-left" action=""><input type="text" class="search-query span4" placeholder="搜索问题"></form>',
    ),
)); ?>
    <div class="clear_top"></div>
    <!--  全局开始  -->
    <div class="main">
        <?php echo $content; ?>
    </div>
    <!--  全局结束  -->
</div>
</body>
</html>
<script type="text/javascript" src="./editor/sy/scripts/shCore.js"></script>
<script type="text/javascript" src="./editor/sy/scripts/shAutoloader.js"></script>
<link type="text/css" rel="stylesheet" href="./editor/sy/styles/shCoreDefault.css"/>
<script type="text/javascript">
    function path()
    {
        var args = arguments,
                result = []
                ;

        for(var i = 0; i < args.length; i++)
            result.push(args[i].replace('@', './editor/sy/scripts/'));

        return result
    };

    SyntaxHighlighter.autoloader.apply(null, path(
            'applescript            @shBrushAppleScript.js',
            'actionscript3 as3      @shBrushAS3.js',
            'bash shell             @shBrushBash.js',
            'coldfusion cf          @shBrushColdFusion.js',
            'cpp c                  @shBrushCpp.js',
            'c# c-sharp csharp      @shBrushCSharp.js',
            'css                    @shBrushCss.js',
            'delphi pascal          @shBrushDelphi.js',
            'diff patch pas         @shBrushDiff.js',
            'erl erlang             @shBrushErlang.js',
            'groovy                 @shBrushGroovy.js',
            'java                   @shBrushJava.js',
            'jfx javafx             @shBrushJavaFX.js',
            'js jscript javascript  @shBrushJScript.js',
            'perl pl                @shBrushPerl.js',
            'php                    @shBrushPhp.js',
            'text plain             @shBrushPlain.js',
            'py python              @shBrushPython.js',
            'ruby rails ror rb      @shBrushRuby.js',
            'sass scss              @shBrushSass.js',
            'scala                  @shBrushScala.js',
            'sql                    @shBrushSql.js',
            'vb vbnet               @shBrushVb.js',
            'xml xhtml xslt html    @shBrushXml.js'
    ));
    SyntaxHighlighter.all();
</script>
