<?php

namespace backend\controllers;


use Yii;
use common\models\Post;
use common\models\PostSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
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
             //ACF过滤
             'access' => [
                 'class' => AccessControl::className(),
                 'rules' => [
                     [
                         //是否云允许 该 roles 执行这些动作
                         'allow' => true,
                         //可执行的动作
                         'actions' => ['login', 'index','error'],
                         ///游客未经认证
                         'roles' => ['?'],
                     ],
                     [
                         'allow' => true,
                         //授权
                         'actions' => ['logout', 'index','view','update'],
                         'roles' => ['@'],
                     ],
                 ],
             ]
/*
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['special-callback'],
                        'roles' => ['?'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            return date('d-m') === '3-20';
                        }
                    ],
                ],
            ],*/
        ];
    }
// Match callback called! This page can be accessed only each October 31st
    public function actionSpecialCallback()
    {
        echo "<br/><br><br><br>",12345;
       // return $this->render(['site/index']);
    }
    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        // $data = Post::find()->where(['id'=>$id])->one();
        //$data = Post::find()->where(['status'=>1])->all();
        // $data = Post::find()->where(['AND',['status'=>2],['author_id'=>1],['like','title','yii2']])->orderBy('id')->all();
        //var_dump($data);exit(0);

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //权限检查
        if (Yii::$app->user->can('createPost')) {
            throw  new  ForbiddenHttpException('你没有该权限');
        }

        $model = new Post();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        //权限检查
        if (Yii::$app->user->can('updatePost')) {
            throw  new  ForbiddenHttpException('你没有该权限');
        }
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
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //权限检查
        if (Yii::$app->user->can('deletePost')) {
            throw  new  ForbiddenHttpException('你没有该权限');
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
