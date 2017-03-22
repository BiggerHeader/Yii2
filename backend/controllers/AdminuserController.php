<?php

namespace backend\controllers;

use backend\models\Password;
use common\models\AuthAssignment;
use common\models\AuthItem;
use Yii;
use common\models\AdminUser;
use common\models\AdminuserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\SignupForm;

/**
 * AdminUserController implements the CRUD actions for AdminUser model.
 */
class AdminuserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AdminUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdminuserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AdminUser model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AdminUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //使用siginupForm 进行验证 新添加的用户信息
        $model = new SignupForm();
        //导入信息到  siginupform  模型中 并验证
        if ($model->load(Yii::$app->request->post())) {
            //验证 与导入成功后  进行保存
            if ($user = $model->signup()) {
                return $this->redirect(['view', 'id' => $user->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AdminUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AdminUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AdminUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AdminUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AdminUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * 重置密码
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionResetpwd($id)
    {
        $model = new Password();

        if ($model->load(Yii::$app->request->post())) {
            //验证 与导入成功后  进行保存
            if ($user = $model->ResetPass($id)) {
                return $this->redirect(['view', 'id' => $user->id]);
            } else {
                return $this->render('resetpwd', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('resetpwd', [
                'model' => $model,
            ]);
        }
    }

    /**
     * 权限的修改 及查看
     * @param $id
     */
    public function actionPrivilege($id)
    {
        //step1  取出所有权限  转成数组 供checkboxlist  使用
        $allPrivileges = AuthItem::find()
            ->select(['name', 'description'])
            //决定选取那种类型的 权限
           // ->where(['type' => 1])
            ->orderBy('description')
            ->all();

        foreach ($allPrivileges as $pri) {
            $allPrivilegesArray[$pri->name] = $pri->description;
        }

        //echo  '<br/><br><br/><br><br/><br>';
        //var_dump($allPrivilegesArray, $allPrivileges);

        //step2 取出当前用户的权限
        $authAssigned = AuthAssignment::find()
            ->select(['item_name'])
            ->where(['user_id' => $id])
            ->all();
        $authAssignedArray = array();
        foreach ($authAssigned as $assigned) {
            array_push($authAssignedArray, $assigned->item_name);
        }
        //step3  提交过来修改的权限
        if (isset($_POST['checked'])) {
            //var_dump($_POST['checked']);exit();
            //删除所有的记录1
            AuthAssignment::deleteAll('user_id=:user_id', [':user_id' => $id]);
            $records = $_POST['checked'];
            foreach ($records as $record) {
                $authChecked = new  AuthAssignment();
                $authChecked->item_name = $record;
                $authChecked->user_id = $id;
                $authChecked->created_at = time();
                //保存
                $authChecked->save();
            }
            $this->redirect(['index']);
        }

        //step4 分配权限
        return $this->render('privilege', ['id' => $id, 'authAssignedArray' => $authAssignedArray, 'allPrivilegesArray' => $allPrivilegesArray]);

    }
}
