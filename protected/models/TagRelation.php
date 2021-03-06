<?php

/**
 * This is the model class for table "tag_relation".
 *
 * The followings are the available columns in table 'tag_relation':
 * @property integer $question_id
 * @property integer $tag_id
 * @property string $date
 */
class TagRelation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TagRelation the static model class
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
		return 'tag_relation';
	}

    public function primaryKey()
    {
        return array('question_id','tag_id');
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question_id, tag_id', 'required'),
			array('question_id, tag_id', 'numerical', 'integerOnly'=>true),
			array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('question_id, tag_id, date', 'safe', 'on'=>'search'),
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
            'tag'=>array(self::BELONGS_TO,'Tag','tag_id'),
            'question'=>array(self::BELONGS_TO,'Question','question_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'question_id' => 'Question',
			'tag_id' => 'Tag',
			'date' => 'Date',
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

		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('tag_id',$this->tag_id);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
