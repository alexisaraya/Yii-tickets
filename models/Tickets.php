<?php

/**
 * This is the model class for table "{{tickets}}".
 *
 * The followings are the available columns in table '{{tickets}}':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $user_id
 * @property string $create_date
 * @property string $status
 */
class Tickets extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tickets}}';
	}
	const TICKET_NEW 		= "N";
	const TICKET_ACTIVE = "A";
	const TICKET_SOLVED = "S";
	const TICKET_FAILED = "F";
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('status', 'length', 'max'=>1),
			array('description, create_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, user_id, create_date, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'sla' => 	array(self::HAS_MANY, 'Sla', 'ticket_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Заголовок',
			'description' => 'Описание',
			'user_id' => 'Пользователь',
			'create_date' => 'Дата создания',
			'status' => 'Статус',
			'reaction' => 'Регирование',
			'solation' => 'Решение',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('reaction',$this->sla->datetime,true);
		$criteria->compare('solvation',$this->sla->datetime,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	private $_old_status;
	public function afterFind(){
		return $this->_old_status;
	}
	public function beforeSave(){
        if (parent::beforeSave()){
            if ($this->isNewRecord){
            		$this->create_date = date('Y-m-d H:i:s');
            		return true;
            }else{
           		return true;
            }
        }
        return false;
  }

public function getStatusName($status=null)
{
	if($status == null)
		$status = $this->status;
    switch($status)
    {
        case self::TICKET_NEW:
            return 'Свежак';
            break;
        case self::TICKET_ACTIVE:
            return 'В работе';
            break;
        case self::TICKET_SOLVED:
        		return 'Решено';
        		break;
        case self::TICKET_FAILED:
        		return 'Проебано!';
        		break;
        default:
            return 'Unknown';
            break;
    }
}

// public function behaviors(){
// 		return array(
//            'CTimestampBehavior' => array(
//                'class'=>'zii.behaviors.CTimestampBehavior',
//                'setUpdateOnCreate'=>false,
//                'createAttribute'=>'create_date', 
//            ),
//        );
			
	
	// }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tickets the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
