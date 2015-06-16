<?php
namespace app\commands;
use Yii;
use yii\console\Controller;
use app\rbac\UserRoleRule;

class RbacController extends Controller
{
    public function actionInit()
    {
		$permit = Yii::$app->authManager->getPermission('canAdmin');
		Yii::$app->authManager->assign($permit, 1);
    }
}
