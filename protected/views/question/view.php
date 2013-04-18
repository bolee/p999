<div class="top-question">
    <div class="left">
        <?php echo $model->title ?>
    </div>
</div>
<div class="span9 content-span9">
    <div class="content-list">
        <div class="left" id="q-<?php echo $model->id ?>">
            <div class="emblem e_1"></div>
            <div class="emblem e_2"><?php echo $model->useful ?></div>
            <div class="emblem e_3"></div>
            <div class="emblem e_4"></div>
        </div>
        <div class="right">
            <!-- question -->
            <div class="post-text" itemprop="description">
                <?php echo $model->content ?>
            </div>
            <div class="post-author">
                <a href="<?php echo Yii::app()->createUrl('/user/view',array('display'=>$model->user->display)) ?>"> <?php echo $model->user->display; ?></a>
                <?php echo $model->date; ?>
            </div>
            <div class="post-supply">
                <?php
                foreach($model->supply as $svalue)
                {
                    ?>
                    <div>
                    <span><?php  echo $svalue->content ?></span>
                    <span> - </span>
                    <span>
                        <a href="<?php echo Yii::app()->createUrl('/user/view',array('display'=>$svalue->user->display)) ?>"><?php echo $svalue->user->display ?></a>
                        <?php echo $svalue->date ?>
                    </span>
                    </div>
                <?php
                }
                ?>
            </div>

        </div>

    </div>
    <!--  answer -->
    <div class="answer-center">
        <div class="answer_num">
            <?php echo $model->answer_num ?> Answers
        </div>
    </div>

    <!-- answer list -->
    <?php foreach($answerData as $value) { ?>
        <div class="content-list answer-list">
            <div class="left" id="a-<?php echo $value->id ?>">
                <div class="emblem e_1"></div>
                <div class="emblem e_2"><?php echo $value->useful ?></div>
                <div class="emblem e_3"></div>
                <div class="emblem e_4"></div>
            </div>
            <div class="right">
                <!-- question -->
                <div class="post-text" itemprop="description">
                    <?php echo $value->content ?>
                </div>
                <div class="post-author">
                    <a href="<?php echo Yii::app()->createUrl('/user/view',array('display'=>$value->user->display)) ?>"> <?php echo $value->user->display; ?></a>
                    <?php echo $value->date; ?>
                </div>
                <div class="post-supply">
                    <?php foreach($value->supply as $svalue) { ?>
                        <div>
                            <span><?php echo $svalue->content ?></span>
                            <span> - </span>
                            <span><a href="<?php echo Yii::app()->createUrl('/user/'.$value->user->display) ?>"><?php echo $value->user->display ?></a> <?php echo $value->date ?></span>
                        </div>
                    <?php } ?>
                </div>

            </div>

        </div>

    <?php } ?>



 </div>
<div class="span3">
    <div class="question-tag">
        <?php
        if(!empty($model->tags))
        {
            ?>
            <p>tagged</p>
            <?php
            foreach(explode(',',$model->tags) as $value)
            {
                ?>
                <a class="label" href="<?php echo Yii::app()->createUrl('/question/tag',array('tag'=>$value)) ?>"><?php echo $value ?></a>
                <br />
            <?php
            }
        }
        ?>
    </div>
    <div class="question-related">
        <ul>
        <?php
        foreach($relation_tag as $value)
        {
            ?>
            <li><a href="<?php echo Yii::app()->createUrl('/question/view',array('id'=>$value->id)) ?>"><?php echo $value->title ?></a> </li>
        <?php
        }
        ?>
        </ul>
    </div>
</div>