<?php
/**
 * Created by IntelliJ IDEA.
 * User: wugangqiang
 * Date: 13-8-9
 * Time: 下午1:40
 * To change this template use File | Settings | File Templates.
 */

class Service
{
    public $cacheTime = 28800;

    // cacheID,methodName,Args
    public function ServiceCache($cacheID, $methodName, $args = array())
    {
        //Yii::app()->cache->flush();
        $data = Yii::app()->cache->get($cacheID);
        if ($data === false) {
            $data = $this->$methodName($args);
            Yii::app()->cache->set($cacheID, $data, $this->cacheTime);
            return $data;
        }
        return $data;
    }

    public function hasCache($cacheID)
    {
        $data = Yii::app()->cache->get($cacheID);
        if ($data === false) {
            return false;
        }
        unset($data);
        return true;
    }
}