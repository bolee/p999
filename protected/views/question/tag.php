<?php
$this->pageTitle = $tag.' - '. Yii::app()->name;
?>
<!--左边-->
<div class="left">
    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'dataProvider'=>$question,
        'itemView'=>'_index',   // refers to the partial view named '_post'
        'template'=>'{items}<hr class="index_hr" style="margin-bottom: 0px;"/>{pager}'
    ));
    ?>
</div>
<!--左边结束-->
<!--右边开始-->
<div class="right span2">
</div>
<!--右边结束-->