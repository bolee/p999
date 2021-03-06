<?php

/**
 * This is the model class for table "question".
 *
 * The followings are the available columns in table 'question':
 * @property integer $id
 * @property string $title
 * @property integer $user_id
 * @property string $date
 * @property integer $answer_num
 * @property integer $click_num
 * @property string $content
 * @property integer $userful
 * @property integer $nouse
 */
class Question extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Question the static model class
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
		return 'question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, user_id', 'required'),
			array('user_id, answer_num, click_num, useful, nouse', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>256),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, user_id, date, answer_num, click_num, content, userful, nouse', 'safe', 'on'=>'search'),
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
            'user'=>array(self::BELONGS_TO,'User','user_id'),
            'answer'=>array(self::HAS_MANY,'Answer','question_id'),
            'supply'=>array(self::HAS_MANY,'Supply','type_id','on'=>'supply.type="q"','alias'=>'supply'),
            'rel'=>array(self::HAS_ONE,'TagRelation','question_id'),
            'tag_relation'=>array(self::HAS_ONE,'TagRelation','question_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'user_id' => 'User',
			'date' => 'Date',
			'answer_num' => 'Answer Num',
			'click_num' => 'Click Num',
			'content' => 'Content',
			'userful' => 'Userful',
			'nouse' => 'Nouse',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('answer_num',$this->answer_num);
		$criteria->compare('click_num',$this->click_num);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('userful',$this->userful);
		$criteria->compare('nouse',$this->nouse);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}