<?php

class UserController extends Controller
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
				'actions'=>array('reg','login'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('logut'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}


    /*
     * 用户登录
     */
    public function actionLogin()
    {
        $user = new LoginForm();
        $this->performAjaxValidation($user);
        $error = null;
        if(isset($_POST['LoginForm']))
        {
            //执行登陆操作
            $user->attributes = $_POST['LoginForm'];
            $_identity = new UserIdentity($user);
            $_identity->authenticate();
            if($_identity->errorCode===UserIdentity::ERROR_NONE)
            {
                $duration=$_POST['LoginForm']['rememberMe'] ? 3600*24*30 : 0; // 30 days
                Yii::app()->user->login($_identity,$duration);
                $this->redirect(array('/site/index'));
            } else {
                $error = '电子邮件或密码错误';
            }
        }
        $this->render('login',array('user'=>$user,'error'=>$error));
    }
    /*
     * 用户注册
     */
    public function actionReg()
    {
        $user = new User();
        $this->performAjaxValidation($user);
        if(isset($_POST['User']))
        {
            $user->attributes = $_POST['User'];
            if($user->save())
            {
                $this->redirect(array('/site/index'));
            }
        }
        $this->render('reg',array('user'=>$user));
    }


	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionLogut()
    {
        Yii::app()->user->logout();
        $this->redirect(array('/site/index'));
    }
}
