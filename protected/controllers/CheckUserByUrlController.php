<?php
const JSTLOGINKEY = "shjs8050";

function strToHex($s)
{
    $r = "";
    $hexes = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b", "c", "d", "e", "f");
    for ($i = 0; $i < strlen($s); $i++) {
        $r .= ($hexes [(ord($s{$i}) >> 4)] . $hexes [(ord($s{$i}) & 0xf)]);
    }
    return $r;
}

function hexToStr($h)
{
    $r = "";
    for ($i = (substr($h, 0, 2) == "") ? 2 : 0; $i < strlen($h); $i += 2) {
        $r .= chr(base_convert(substr($h, $i, 2), 16, 10));
    }
    return $r;
}

function base64url_decode($base64url)
{
    $base64 = strtr($base64url, '-_', '+/');
    $plainText = base64_decode($base64);
    return ($plainText);
}

function jst_json_decode($getText)
{
    $values = array();
    foreach ($getText as $p2) {
        $_p1 = explode("=", $p2);
        $tt = hexToStr($_p1[1]);
        $ttt = mcrypt_decrypt(MCRYPT_DES, JSTLOGINKEY, $tt, MCRYPT_MODE_ECB, "");
        $values [$_p1[0]] = mb_convert_encoding(trim($ttt), "UTF-8", "GBK");
    }
    return $values;
}


class CheckUserByUrlController extends Controller
{
    public function actionIndex()
    {
        if (!isset($_GET['jsedu'])) {
            echo CJSON::encode(array());
            Yii::app()->end();
        }
        $p1 = explode("&", base64url_decode($_GET['jsedu']));
        if (count($p1) < 8) {
            echo CJSON::encode(array());
            Yii::app()->end();
        }
        $user = jst_json_decode($p1);
        echo CJSON::encode($user);
    }

}