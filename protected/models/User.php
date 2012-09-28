<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $display
 * @property string $email
 * @property string $password
 */
class User extends CActiveRecord
{
    public $password2;
    protected  $_identity=null;
    public $rememberMe=false;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('display, email,password', 'required'),
            //array('display,email','unique'),
            array('display, email', 'length', 'max'=>32),
            array('email','email'),
            array('password','length','min'=>'6','max'=>'16'),
            //下面这段加上 'on'=>'reg' 为什么不起作用呢?
            array('password2','compare','compareAttribute'=>'password','message'=>'密码输入不一致'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, display, email, password', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'display' => '显示名称',
			'email' => 'Email',
			'password' => '密码',
            'password2' => '重复密码',
            'rememberMe'=>'下次自动登录'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('display',$this->display,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function beforeSave()
    {
        if($this->isNewRecord)
        {
            unset($this->password2);
            $this->password = $this->encrypt($this->password);
        }
        return parent::beforeSave();
    }

    public function encrypt($value)
    {
        return md5($value);
    }

    public function afterSave()
    {
        //执行登陆操作
        $this->_identity = new UserIdentity($this);
        $this->_identity->authenticate();
        if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
        {
            $duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
            Yii::app()->user->login($this->_identity,$duration);
            return true;
        }
        else
        {
            return false;
        }

    }
}