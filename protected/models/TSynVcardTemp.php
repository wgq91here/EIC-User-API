<?php

/**
 * This is the model class for table "t_syn_vcard_temp".
 *
 * The followings are the available columns in table 't_syn_vcard_temp':
 * @property integer $PID
 * @property string $owner_jid
 * @property string $given
 * @property string $family
 * @property string $Person_url
 * @property string $role
 * @property string $gender
 * @property string $work_url
 * @property string $org_name
 * @property string $org_unit
 * @property string $p_sign
 * @property string $person_street
 * @property string $person_region
 * @property string $person_localcity
 * @property string $work_pcode
 * @property string $person_pcode
 * @property string $person_country
 * @property string $person_voice
 * @property string $person_fax
 * @property string $person_cell
 * @property integer $roster_version
 * @property string $vcard_version
 * @property string $vcard_photo_id
 */
class TSynVcardTemp extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TSynVcardTemp the static model class
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
		return 't_syn_vcard_temp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PID', 'required'),
			array('PID, roster_version', 'numerical', 'integerOnly'=>true),
			array('owner_jid, vcard_version', 'length', 'max'=>32),
			array('given, family, work_pcode, person_pcode, person_voice, person_fax, person_cell', 'length', 'max'=>63),
			array('Person_url, work_url, org_name, org_unit, person_street, person_region, person_localcity, person_country', 'length', 'max'=>255),
			array('role', 'length', 'max'=>64),
			array('gender', 'length', 'max'=>16),
			array('p_sign', 'length', 'max'=>1024),
			array('vcard_photo_id', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PID, owner_jid, given, family, Person_url, role, gender, work_url, org_name, org_unit, p_sign, person_street, person_region, person_localcity, work_pcode, person_pcode, person_country, person_voice, person_fax, person_cell, roster_version, vcard_version, vcard_photo_id', 'safe', 'on'=>'search'),
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
			'owner_jid' => 'Owner Jid',
			'given' => 'Given',
			'family' => 'Family',
			'Person_url' => 'Person Url',
			'role' => 'Role',
			'gender' => 'Gender',
			'work_url' => 'Work Url',
			'org_name' => 'Org Name',
			'org_unit' => 'Org Unit',
			'p_sign' => 'P Sign',
			'person_street' => 'Person Street',
			'person_region' => 'Person Region',
			'person_localcity' => 'Person Localcity',
			'work_pcode' => 'Work Pcode',
			'person_pcode' => 'Person Pcode',
			'person_country' => 'Person Country',
			'person_voice' => 'Person Voice',
			'person_fax' => 'Person Fax',
			'person_cell' => 'Person Cell',
			'roster_version' => 'Roster Version',
			'vcard_version' => 'Vcard Version',
			'vcard_photo_id' => 'Vcard Photo',
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
		$criteria->compare('owner_jid',$this->owner_jid,true);
		$criteria->compare('given',$this->given,true);
		$criteria->compare('family',$this->family,true);
		$criteria->compare('Person_url',$this->Person_url,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('work_url',$this->work_url,true);
		$criteria->compare('org_name',$this->org_name,true);
		$criteria->compare('org_unit',$this->org_unit,true);
		$criteria->compare('p_sign',$this->p_sign,true);
		$criteria->compare('person_street',$this->person_street,true);
		$criteria->compare('person_region',$this->person_region,true);
		$criteria->compare('person_localcity',$this->person_localcity,true);
		$criteria->compare('work_pcode',$this->work_pcode,true);
		$criteria->compare('person_pcode',$this->person_pcode,true);
		$criteria->compare('person_country',$this->person_country,true);
		$criteria->compare('person_voice',$this->person_voice,true);
		$criteria->compare('person_fax',$this->person_fax,true);
		$criteria->compare('person_cell',$this->person_cell,true);
		$criteria->compare('roster_version',$this->roster_version);
		$criteria->compare('vcard_version',$this->vcard_version,true);
		$criteria->compare('vcard_photo_id',$this->vcard_photo_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}