<hr class="index_hr" />
<div class="index_list">
    <div class="status">
        <div class="status_answer" title="回答数量">&nbsp;&nbsp; <?php echo $data->answer_num; ?></div>
        <div class="status_click" title="点击数量">&nbsp;&nbsp; <?php echo $data->click_num; ?></div>
    </div>
    <div class="index_row">
        <h2><a href="<?php echo Yii::app()->createUrl('/question/view',array('id'=>$data->id)) ?>"><?php echo $data->title; ?></a></h2>
        <div class="meta">
            这里是标签<span><?php echo $data->date; ?></span>
        </div>
    </div>
</div>