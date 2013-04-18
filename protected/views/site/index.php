
<div class="span9 ">
    <div class="top-question">
        <div class="left">
            Top Questions
        </div>
    </div>

    <?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$question,
        'itemView'=>'_index',   // refers to the partial view named '_post'
        'template'=>'{items}<hr class="index_hr" style="margin-bottom: 0px;"/>{pager}'
    ));
    ?>
</div>
<div class="span3">
    Level 2
</div>
</div>
