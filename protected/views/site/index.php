<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
    <li>View file: <code><?php echo __FILE__; ?></code></li>
    <li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<?php
$userService = new TUserService();
//CVarDumper::dump($userService->getUsers(), 3, true);

//CVarDumper::dump($userService->getUsersBySchool(), 3, true);
//CVarDumper::dump($userService->getUsersByName(), 3, true);
$usersName = $userService->getUsersByName();
CVarDumper::dump($usersName['HHQ22044'],3,true);
?>

<?php
$tDepart = new TEnterpriseDept();
$_depart = $tDepart->with('users')->findByPk(177);
foreach ($_depart->users as $user) {
    echo $user->LoginName . ',' . $user->UserName . ',';
}

?>

<p>For more details on how to further develop this application, please read
    the <a href="http://www.yiiframework.com/doc/">documentation</a>.
    Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
    should you have any questions.</p>
