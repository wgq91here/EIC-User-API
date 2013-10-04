<?php
/**
 * Created by IntelliJ IDEA.
 * User: wugangqiang
 * Date: 13-9-3
 * Time: 上午7:29
 * To change this template use File | Settings | File Templates.
 */

class AtCacheCommand extends CConsoleCommand
{
    public function actionIndex()
    {
        Yii::import("application.models.*");
        Yii::import("application.components.*");
        echo "TUserServer Init.\n";
        $_UserServer = New TUserService();
        echo "TUserServer getUsers.\n";
        $_UserServer->getUsers();
        echo "TUserServer getUsers cache is created!\n";
    }
}