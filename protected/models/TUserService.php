<?php
/**
 * Created by IntelliJ IDEA.
 * User: wugangqiang
 * Date: 13-8-9
 * Time: 下午1:40
 * To change this template use File | Settings | File Templates.
 */

class TUserService extends Service
{
    public $users = array();
    public $usersByName = array();
    public $usersBySchool = array();

    public function _getUsers($arg = array())
    {
        // 不通过 JONI方式进行数据库查询
        // 直接获取 全部 组织数据
        $tDepart = array();
        foreach (TEnterpriseDept::model()->findAll() as $depart) {
            $tDepart[$depart->ID] = $depart->attributes;
        }
        //
        $tUser = new TUser();
        $criteria = new CDbCriteria;
        $criteria->select = "PID,LoginName,DepartmentID,DepartmentMapping,UserName";
        //$criteria->addCondition("PID<2000");
        //$criteria->with = array("card");
        foreach ($tUser->findAll($criteria) as $user) {

            $this->users[$user->PID]['PID'] = $user->PID;
            $this->users[$user->PID]['LoginName'] = $user->LoginName;
            $this->users[$user->PID]['DepartmentID'] = $user->DepartmentID;
            $this->users[$user->PID]['DepartmentMapping'] = $user->DepartmentMapping;
            $this->users[$user->PID]['Email'] = strtolower($user->LoginName . "@jsedu.sh.cn");
            $this->users[$user->PID]['UserName'] = $user->UserName;
            // 取得用户所在单位
            $_departs = array_diff(explode(",", $user->DepartmentMapping), array(''));
            //
            if (count($_departs) > 1) {
                $_schoolID = $_departs[1];
            } else {
                $_schoolID = $_departs[0];
            }

            $depart = $tDepart[$_schoolID];
            $this->users[$user->PID]['schoolName'] = $depart['Name'];

            // 取得用户所在部门
            if (count($_departs) > 1) {
                $_schoolDepartID = $_departs;
                unset($_schoolDepartID[0], $_schoolDepartID[1]);
                foreach ($_schoolDepartID as $id) {
                    $this->users[$user->PID]['schoolDeparts'][] = $tDepart[$id]['Name'];
                }
            }
            // 用户照片
            if ($user->card->vcard_photo_id) {
                $this->users[$user->PID]['pictureUrl'] = 'http://jst.jsedu.sh.cn:14131/headpicture/' . $user->card->vcard_photo_id . '.jpg';
            } else {
                $this->users[$user->PID]['pictureUrl'] = "";
            }
        }

        return $this->users;
    }

    public function _getUsersByName()
    {
        $users = $this->getUsers();
        foreach ($users as $user) {
            $this->usersByName[strtoupper($user['LoginName'])] = $user;
        }
        return $this->usersByName;
    }

    /*
     * 整理用户资源
     * 将 users 按用户名 排 数组
     */
    public function getUsersByName()
    {
        // cacheID,methodName,Args
        $this->usersByName = $this->ServiceCache(__CLASS__ . '_getUsersByName()', '_getUsersByName', array());
        return $this->usersByName;
    }


    public function _getUsersBySchool()
    {
        $users = $this->getUsers();
        foreach ($users as $user) {
            $this->usersBySchool[$user['schoolName']][$user['PID']] = $user;
        }
        return $this->usersBySchool;
    }

    /*
     * 整理用户资源
     * 将 users 按学校单位 排 数组
     */
    public function getUsersBySchool()
    {
        // cacheID,methodName,Args
        $this->usersBySchool = $this->ServiceCache(__CLASS__ . '_getUsersBySchool()', '_getUsersBySchool', array());
        return $this->usersBySchool;
    }

    public function getUsers()
    {
        // cacheID,methodName,Args
        $this->users = $this->ServiceCache(__CLASS__ . '_getUser()', '_getUsers', array());
        return $this->users;
    }

}