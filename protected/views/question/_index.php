<hr class="index_hr" />
<div class="index_list">
    <div class="status">
        <div class="status_answer" title="answer num">&nbsp;&nbsp; <?php echo $data->answer_num; ?></div>
        <div class="status_click" title="click num">&nbsp;&nbsp; <?php echo $data->click_num; ?></div>
    </div>
    <div class="index_row">
        <h2><a href="<?php echo Yii::app()->createUrl('/question/view',array('id'=>$data->id)) ?>"><?php echo $data->title; ?></a></h2>
        <div class="meta">
            <?php
                if(!empty($data->tags))
                {
                    foreach(explode(',',$data->tags) as $value)
                    {
                        ?>
                        <a class="label" href="<?php echo Yii::app()->createUrl('/question/tag',array('tag'=>$value)) ?>"><?php echo $value ?></a>
                        <?php
                    }
                }
            ?>
            <span><?php echo $data->date; ?></span>
        </div>
    </div>
</div>