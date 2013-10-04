<?php

/**
 * This is the model class for table "t_user".
 *
 * The followings are the available columns in table 't_user':
 * @property integer $PID
 * @property integer $AccountID
 * @property string $LoginName
 * @property string $Password
 * @property string $AroID
 * @property integer $LoginCount
 * @property string $LoginDate
 * @property string $LoginIP
 * @property integer $IsAdmin
 * @property integer $superadmin
 * @property integer $DepartmentID
 * @property string $DepartmentMapping
 * @property string $UserName
 * @property string $JID
 * @property string $IMPassword
 * @property integer $Status
 * @property integer $ImportFlag
 * @property integer $IsDelete
 * @property string $CreateDate
 * @property integer $Ifsafe
 * @property integer $IsHeader
 * @property integer $ShowIndex
 * @property integer $StatusTag
 * @property string $syncUserId
 * @property integer $importType
 * @property integer $canSearch
 * @property string $cn
 */
class TUser extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return TUser the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 't_user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('AccountID, LoginName, UserName, JID, CreateDate', 'required'),
            array('AccountID, LoginCount, IsAdmin, superadmin, DepartmentID, Status, ImportFlag, IsDelete, Ifsafe, IsHeader, ShowIndex, StatusTag, importType, canSearch', 'numerical', 'integerOnly' => true),
            array('LoginName, Password, LoginIP, IMPassword', 'length', 'max' => 50),
            array('AroID, DepartmentMapping, syncUserId, cn', 'length', 'max' => 255),
            array('UserName, JID', 'length', 'max' => 32),
            array('LoginDate', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('PID, AccountID, LoginName, Password, AroID, LoginCount, LoginDate, LoginIP, IsAdmin, superadmin, DepartmentID, DepartmentMapping, UserName, JID, IMPassword, Status, ImportFlag, IsDelete, CreateDate, Ifsafe, IsHeader, ShowIndex, StatusTag, syncUserId, importType, canSearch, cn', 'safe', 'on' => 'search'),
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
            'depart' => array(self::BELONGS_TO, 'TEnterpriseDept', 'DepartmentID'),
            'card' => array(self::HAS_ONE, 'TSynVcardTemp', 'PID')
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
            'LoginName' => 'Login Name',
            'Password' => 'Password',
            'AroID' => 'Aro',
            'LoginCount' => 'Login Count',
            'LoginDate' => 'Login Date',
            'LoginIP' => 'Login Ip',
            'IsAdmin' => 'Is Admin',
            'superadmin' => 'Superadmin',
            'DepartmentID' => 'Department',
            'DepartmentMapping' => 'Department Mapping',
            'UserName' => 'User Name',
            'JID' => 'Jid',
            'IMPassword' => 'Impassword',
            'Status' => 'Status',
            'ImportFlag' => 'Import Flag',
            'IsDelete' => 'Is Delete',
            'CreateDate' => 'Create Date',
            'Ifsafe' => 'Ifsafe',
            'IsHeader' => 'Is Header',
            'ShowIndex' => 'Show Index',
            'StatusTag' => 'Status Tag',
            'syncUserId' => 'Sync User',
            'importType' => 'Import Type',
            'canSearch' => 'Can Search',
            'cn' => 'Cn',
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

        $criteria = new CDbCriteria;

        $criteria->compare('PID', $this->PID);
        $criteria->compare('AccountID', $this->AccountID);
        $criteria->compare('LoginName', $this->LoginName, true);
        $criteria->compare('Password', $this->Password, true);
        $criteria->compare('AroID', $this->AroID, true);
        $criteria->compare('LoginCount', $this->LoginCount);
        $criteria->compare('LoginDate', $this->LoginDate, true);
        $criteria->compare('LoginIP', $this->LoginIP, true);
        $criteria->compare('IsAdmin', $this->IsAdmin);
        $criteria->compare('superadmin', $this->superadmin);
        $criteria->compare('DepartmentID', $this->DepartmentID);
        $criteria->compare('DepartmentMapping', $this->DepartmentMapping, true);
        $criteria->compare('UserName', $this->UserName, true);
        $criteria->compare('JID', $this->JID, true);
        $criteria->compare('IMPassword', $this->IMPassword, true);
        $criteria->compare('Status', $this->Status);
        $criteria->compare('ImportFlag', $this->ImportFlag);
        $criteria->compare('IsDelete', $this->IsDelete);
        $criteria->compare('CreateDate', $this->CreateDate, true);
        $criteria->compare('Ifsafe', $this->Ifsafe);
        $criteria->compare('IsHeader', $this->IsHeader);
        $criteria->compare('ShowIndex', $this->ShowIndex);
        $criteria->compare('StatusTag', $this->StatusTag);
        $criteria->compare('syncUserId', $this->syncUserId, true);
        $criteria->compare('importType', $this->importType);
        $criteria->compare('canSearch', $this->canSearch);
        $criteria->compare('cn', $this->cn, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}