<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $salt
 */
class Users extends CActiveRecord
{
    public $repeat_password;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email', 'length', 'max'=>100),
            array('email, password, repeat_password', 'required'),
//            array('email', 'unique', 'message' => 'email already exist.'),
			array('password, repeat_password, salt', 'length', 'max'=>50, 'min' =>6),
            array('repeat_password', 'compare', 'compareAttribute'=>'password'),
            array('email', 'email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, password, repeat_password, salt', 'safe', 'on'=>'search'),
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
			'email' => 'Email',
			'password' => 'Password',
			'salt' => 'Salt',
            'repeat_password' => 'Repeat password'
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function BeforeSave()
    {
        if (parent::beforeSave()) {
            $this->date_created = strtotime('now');
            $this->salt = uniqid();
            $this->password = sha1($this->password . $this->salt);
            return true;
        } else {
            return false;
        }
    }

    public function BeforeValidate()
    {
        //Unique email

        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $criteria->condition = 'email=:Email';
        $criteria->params = array(':Email' => $this->email);

        $user = Users::model()->find($criteria);
        if($user)
        {
            //To be continued ...
        }
    }
}