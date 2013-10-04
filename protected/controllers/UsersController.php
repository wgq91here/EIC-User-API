<?php

class UsersController extends Controller
{
    /*
     * 默认为 取得某个用户信息
     * http://10.168.6.186/api/index.php/Users/?ID={$id|$LoginName}
     */
    public function actionIndex($ID)
    {
        $ID = strtoupper($ID);
        $userService = new TUserService();
        // By LoginName
        $usersName = $userService->getUsersByName();
        if (isset($usersName[$ID])) {
            echo CJSON::encode($usersName[$ID]);
            Yii::app()->end();
        }
        // By PID
        $users = $userService->getUsers();
        if (isset($users[$ID])) {
            echo CJSON::encode($users[$ID]);
            Yii::app()->end();
        }
        echo CJSON::encode(array());
        Yii::app()->end();
    }

}