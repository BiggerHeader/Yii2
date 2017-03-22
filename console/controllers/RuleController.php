<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2017-03-20
 * Time: 11:25
 */
namespace console\controllers;

use console\rbac\AuthorRule;
use Yii;
use yii\console\Controller;

class RuleController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

// add the rule
        $rule = new AuthorRule();
        $auth->add($rule);
        $author = $auth->createRole('author');
// add the "updateOwnPost" permission and associate the rule with it.
        $updateOwnPost = $auth->createPermission('updateOwnPost');
        $updateOwnPost->description = 'Update own post';
        $updateOwnPost->ruleName = $rule->name;
        $auth->add($updateOwnPost);

// "updateOwnPost" will be used from "updatePost"
        $auth->addChild($updateOwnPost, 'updatePost');

// allow "author" to update their own posts
        $auth->addChild($author, $updateOwnPost);
    }
}