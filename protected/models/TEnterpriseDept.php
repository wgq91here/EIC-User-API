<?php

/**
 * This is the model class for table "t_enterprise_dept".
 *
 * The followings are the available columns in table 't_enterprise_dept':
 * @property integer $ID
 * @property integer $AccountID
 * @property string $Name
 * @property integer $ParentID
 * @property string $Mapping
 * @property integer $Level
 * @property integer $IsLeaf
 * @property integer $ShowIndex
 * @property string $syncDepId
 * @property integer $Tag
 * @property string $Remak
 * @property string $CreateDate
 * @property integer $StatusTag
 * @property integer $importType
 */
class TEnterpriseDept extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return TEnterpriseDept the static model class
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
        return 't_enterprise_dept';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('AccountID, Name', 'required'),
            array('AccountID, ParentID, Level, IsLeaf, ShowIndex, Tag, StatusTag, importType', 'numerical', 'integerOnly' => true),
            array('Name', 'length', 'max' => 30),
            array('Mapping, syncDepId', 'length', 'max' => 255),
            array('Remak, CreateDate', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('ID, AccountID, Name, ParentID, Mapping, Level, IsLeaf, ShowIndex, syncDepId, Tag, Remak, CreateDate, StatusTag, importType', 'safe', 'on' => 'search'),
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
            'users' =>
            array(self::HAS_MANY, 'TUser', 'DepartmentID')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'ID' => 'ID',
            'AccountID' => 'Account',
            'Name' => 'Name',
            'ParentID' => 'Parent',
            'Mapping' => 'Mapping',
            'Level' => 'Level',
            'IsLeaf' => 'Is Leaf',
            'ShowIndex' => 'Show Index',
            'syncDepId' => 'Sync Dep',
            'Tag' => 'Tag',
            'Remak' => 'Remak',
            'CreateDate' => 'Create Date',
            'StatusTag' => 'Status Tag',
            'importType' => 'Import Type',
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

        $criteria->compare('ID', $this->ID);
        $criteria->compare('AccountID', $this->AccountID);
        $criteria->compare('Name', $this->Name, true);
        $criteria->compare('ParentID', $this->ParentID);
        $criteria->compare('Mapping', $this->Mapping, true);
        $criteria->compare('Level', $this->Level);
        $criteria->compare('IsLeaf', $this->IsLeaf);
        $criteria->compare('ShowIndex', $this->ShowIndex);
        $criteria->compare('syncDepId', $this->syncDepId, true);
        $criteria->compare('Tag', $this->Tag);
        $criteria->compare('Remak', $this->Remak, true);
        $criteria->compare('CreateDate', $this->CreateDate, true);
        $criteria->compare('StatusTag', $this->StatusTag);
        $criteria->compare('importType', $this->importType);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}