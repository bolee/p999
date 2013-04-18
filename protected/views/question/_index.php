<div class="question-list">
    <div>
        <div class="votes">
            <div class="counts"><?php echo $data->useful ?></div>
            <div>votes</div>
        </div>
        <div class="answers">
            <div class="counts"><?php echo $data->answer_num ?></div>
            <div>answers</div>
        </div>
        <div class="view">
            <div class="counts"><?php echo $data->click_num ?></div>
            <div>view</div>
        </div>
    </div>
    <div class="summary">
        <h3>
            <a href="<?php echo Yii::app()->createUrl('/question/view',array('id'=>$data->id)) ?>" class="question-hyperlink" title="<?php echo $data->title; ?>"><?php echo $data->title; ?></a></h3>
        <div class="tag">
            <?php
            if(!empty($data->tags))
            {
                foreach(explode(',',$data->tags) as $value)
                {
                    ?>
                    <a href="<?php echo Yii::app()->createUrl('/question/tag',array('tag'=>$value)) ?>"><?php echo $value ?></a>
                <?php
                }
            }
            ?>
        </div>
    </div>
</div>