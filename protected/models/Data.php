<?php

/**
 * This is the model class for table "data".
 *
 * The followings are the available columns in table 'data':
 * @property integer $id
 * @property integer $id_user
 * @property string $name
 * @property string $login
 * @property string $password
 * @property string $notes
 */
class Data extends CActiveRecord
{

    public $complexity;
    public $salt;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Data the static model class
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
		return 'data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user', 'numerical', 'integerOnly'=>true),
			array('name, login, password', 'length', 'max'=>100),
			array('notes', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_user, name, login, password, notes', 'safe', 'on'=>'search'),
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
			'id_user' => 'Id User',
			'name' => 'Name',
			'login' => 'Login',
			'password' => 'Password',
			'notes' => 'Notes',
            'salt' => 'Salt',
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

        $criteria->condition = 'id_user=:Id_user';
        $criteria->params = array(':Id_user' => Yii::app()->user->id);

		$criteria->compare('id',$this->id);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('notes',$this->notes,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination' => false,
        ));
	}

    public function getComplexityValue()
    {
        $maximum = 215;
        $strength = $this->getPasswordStrength();

        $complexity = $strength/($maximum/100);
        $complexity = round($complexity);

        if($complexity < 40)
        {
            $tooltip = "weak";
            $cssClass = "progress-danger";
        }
        elseif($complexity < 60)
        {
            $tooltip = "normal";
            $cssClass = "progress-warning";
        }
        elseif($complexity < 80)
        {
            $tooltip = "strong";
            $cssClass = "progress-info";
        }
        else
        {

            $tooltip = "very strong";
            $cssClass = "progress-success";
        }

        return '<div title="'.$tooltip.'" class="progress progress-striped '.$cssClass.'"><div class="bar" style="width: '.$complexity.'%"></div></div>';
    }

    private function getPasswordStrength()
    {

        $this->password = $this->getDecodedPassword();

        if(strlen($this->password) >= 10)
            $length = 10;
        else
            $length = strlen($this->password);

        if(preg_match_all('/[a-z]/', $this->password, $matches) >= 3)
            $letters = 3;
        else
            $letters = preg_match_all('/[a-z]/', $this->password, $matches);

        if(preg_match_all('/[A-Z]/', $this->password, $matches) >= 3)
            $upper = 3;
        else
            $upper = preg_match_all('/[A-Z]/', $this->password, $matches);

        if(preg_match_all('/[0-9]/', $this->password, $matches) >= 3)
            $numeric = 3;
        else
            $numeric = preg_match_all('/[0-9]/', $this->password, $matches);

        if(preg_match_all('/[^A-Za-z0-9_]/', $this->password, $matches) >= 3)
            $symbols = 3;
        else
            $symbols = preg_match_all('/^A-Za-z0-9_/', $this->password, $matches);

        $strength = (($length*10)-20) + ($numeric*10) + ($symbols*15) + ($upper*10) + ($letters*10);

        return $strength;
    }

    public function BeforeSave()
    {
        if (parent::beforeSave()) {
            $this->salt = uniqid();
            $this->password = base64_encode($this->password . $this->salt);
            return true;
        } else {
            return false;
        }
    }

    public function getDecodedPassword()
    {
        return str_replace($this->salt, "", base64_decode($this->password));
    }

}