<?php

/**
 * This is the model class for table "t_user_info".
 *
 * The followings are the available columns in table 't_user_info':
 * @property integer $PID
 * @property integer $AccountID
 * @property string $NickName
 * @property string $Title
 * @property string $Country
 * @property string $Province
 * @property string $City
 * @property string $District
 * @property string $Addr
 * @property string $TelAreaCode
 * @property string $Tel
 * @property string $TelExt
 * @property string $Mobile
 * @property string $FaxAreaCode
 * @property string $Fax
 * @property string $FaxExt
 * @property string $Email
 * @property string $BirthDay
 * @property string $Memo
 * @property string $TitleDesc
 */
class TUserInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TUserInfo the static model class
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
		return 't_user_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PID, AccountID', 'required'),
			array('PID, AccountID', 'numerical', 'integerOnly'=>true),
			array('NickName, Title, Tel, TelExt, Fax, FaxExt', 'length', 'max'=>32),
			array('Country, Province, City, District', 'length', 'max'=>16),
			array('Addr, BirthDay', 'length', 'max'=>64),
			array('TelAreaCode, FaxAreaCode', 'length', 'max'=>10),
			array('Mobile', 'length', 'max'=>20),
			array('Email', 'length', 'max'=>60),
			array('Memo', 'length', 'max'=>254),
			array('TitleDesc', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PID, AccountID, NickName, Title, Country, Province, City, District, Addr, TelAreaCode, Tel, TelExt, Mobile, FaxAreaCode, Fax, FaxExt, Email, BirthDay, Memo, TitleDesc', 'safe', 'on'=>'search'),
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
			'PID' => 'Pid',
			'AccountID' => 'Account',
			'NickName' => 'Nick Name',
			'Title' => 'Title',
			'Country' => 'Country',
			'Province' => 'Province',
			'City' => 'City',
			'District' => 'District',
			'Addr' => 'Addr',
			'TelAreaCode' => 'Tel Area Code',
			'Tel' => 'Tel',
			'TelExt' => 'Tel Ext',
			'Mobile' => 'Mobile',
			'FaxAreaCode' => 'Fax Area Code',
			'Fax' => 'Fax',
			'FaxExt' => 'Fax Ext',
			'Email' => 'Email',
			'BirthDay' => 'Birth Day',
			'Memo' => 'Memo',
			'TitleDesc' => 'Title Desc',
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

		$criteria->compare('PID',$this->PID);
		$criteria->compare('AccountID',$this->AccountID);
		$criteria->compare('NickName',$this->NickName,true);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('Country',$this->Country,true);
		$criteria->compare('Province',$this->Province,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('District',$this->District,true);
		$criteria->compare('Addr',$this->Addr,true);
		$criteria->compare('TelAreaCode',$this->TelAreaCode,true);
		$criteria->compare('Tel',$this->Tel,true);
		$criteria->compare('TelExt',$this->TelExt,true);
		$criteria->compare('Mobile',$this->Mobile,true);
		$criteria->compare('FaxAreaCode',$this->FaxAreaCode,true);
		$criteria->compare('Fax',$this->Fax,true);
		$criteria->compare('FaxExt',$this->FaxExt,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('BirthDay',$this->BirthDay,true);
		$criteria->compare('Memo',$this->Memo,true);
		$criteria->compare('TitleDesc',$this->TitleDesc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}