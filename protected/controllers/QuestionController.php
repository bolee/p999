<?php

class QuestionController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','tag'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','supply'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $model=Question::model()->with(array('supply','user'))->findByPk($id);
        if(empty($model))
        {
            throw new CHttpException('404','QUESTION NOT FOUND');
        }
        $answer=new Answer();
        $answerData = Answer::model()->with(array('supply','user'))->findAllByAttributes(array('question_id'=>$model->id));
        //reltaion tag
        $rel = TagRelation::model()->findAllByAttributes(array('question_id'=>$model->id));
        $id = null;
        $relation_tag = null;
        if(!empty($rel))
        {
            foreach($rel as $value)
            {
                $id .= $value->tag_id.',';
            }
            $id = rtrim($id,',');
            $relation_tag = Question::model()->with(array('tag_relation'=>array(
                'on'=>'r.question_id=q.id',
                'alias'=>'r',
                'condition'=>"r.tag_id in ($id)",
            )))->findAll(array('alias'=>'q','order'=>'q.id DESC','limit'=>30));
        }
        if(isset($_POST['Answer']))
        {
            //添加评论
            $answer->attributes = $_POST['Answer'];
            $answer->user_id = Yii::app()->user->id;
            $answer->date = date('Y-m-d H:i:s');
            $answer->question_id = $model->id;
            if($answer->save())
            {
                $this->redirect(array('/question/view','id'=>$model->id));
            }
        }
        $this->render('view',array(
			'model'=>$model,
            'answer'=>$answer,
            'answerData'=>$answerData,
            'relation_tag'=>$relation_tag
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Question;
        $tag =new Tag();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Question']))
		{
            //增加问题
			$model->attributes=$_POST['Question'];
            $model->tags = $_POST['Tag']['name'];
            $model->user_id = Yii::app()->user->id;
			if($model->save())
            {
                $rel = new TagRelation();
                //执行TAG插入
                foreach(explode(',',$model->tags) as $value)
                {
                    //查询是否存在
                    $data = $tag->findByAttributes(array('name'=>$value));
                    if(empty($data))
                    {
                        //插入
                        $tag->name = $value;
                        $tag->total = 1;
                        $tag->save();
                        //跟文章进行关联
                        $rel->question_id = $model->id;
                        $rel->tag_id = $tag->id;
                        $rel->save();
                        $rel->isNewRecord = true;
                        $tag->id = null;
                        $tag->isNewRecord = true;
                    } else {
                        $data->updateCounters(array('total'=>1));
                        //跟文章进行关联
                        $rel->question_id = $model->id;
                        $rel->tag_id = $data->id;
                        $rel->save();
                        $rel->isNewRecord = true;
                    }
                }
                $this->redirect(array('view','id'=>$model->id));
            } else {

            }

		}

		$this->render('create',array(
			'model'=>$model,
            'tag'=>$tag
		));
	}

    /*
     * 补充
     *
     */
    public function actionSupply()
    {
        if(isset($_POST['content']))
        {
            $supply = new Supply();
            $supply->content = $_POST['content'];
            list($type,$supply->type_id) = explode('-',$_POST['type_id']);
            if($type == 'question')
            {
                $supply->type = 'q';
            } else {
                $supply->type = 'a';
            }
            $supply->date = date('Y-m-d H:i:s',time());
            $supply->user_id = Yii::app()->user->id;
            if($supply->save())
            {
                echo CJSON::encode(true);
            } else {
                echo CJSON::decode(false);
            }
        }
    }


	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Question');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

    public function actionTag($tag)
    {
        $name = Tag::model()->findByAttributes(array('name'=>$tag));
        $question = new CActiveDataProvider('Question',array(
            'criteria'=>array(
                'order'=>'q.id DESC',
                'alias'=>'q',
                'condition'=>"r.tag_id = {$name->id}",
                'with'=>array(
                    'rel'=>array(
                        'alias'=>'r',
                        'joinType'=>'inner join'
                    )
                )
            ),
            'pagination'=>array(
                'pageSize'=>50,
            ),
        ));
        $this->render('tag',array('question'=>$question));
    }


	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='question-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
