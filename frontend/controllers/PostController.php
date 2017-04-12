<?php

namespace frontend\controllers;

use common\models\Comment;
use common\models\User;
use Yii;
use common\models\Post;
use common\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Tag;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    protected  $submit_comment;
    protected $tips_login;
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
            'pageCache' => [
                'class' => 'yii\filters\PageCache',
                //设置缓存 有效的动作/页面
                'only' => ['index'],
                'duration' => 60,
                //设置缓存依赖
                'dependency' => [
                    'class' => 'yii\caching\DbDependency',
                    'sql' => 'SELECT COUNT(*) FROM post',
                ],
                //设置缓存跟随参数变化进行变化
                'variations' => [
                    \Yii::$app->language,
                    \Yii::$app->request->get('PostSearch'),
                    \Yii::$app->request->get('PostSearch[tags]'),
                    \Yii::$app->request->get('page'),
                ]
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        //获取标签
        $tags = Tag::findTagWeight();
        //var_dump($tags);exit();

        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //获取最新评论
        $recentComments = Comment::RecentComment();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tags' => $tags,
            'recentComments' => $recentComments,
        ]);
    }

    /**
     * Displays a single Post model.
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
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
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

    public function actionDetail($id)
    {
        //准备数据模型
        $model =$this->findModel($id);
        $tags = Tag::findTagWeight();
        $recentComments = Comment::RecentComment();

        $user = User::findOne(Yii::$app->user->id);
        $commentModel = new  Comment();
        $commentModel->email=$user['email'];
        $commentModel->userid= $user['id'];
        //判断处理请求

        if($commentModel->load(Yii::$app->request->post())){

            $commentModel->status = 2;
            $commentModel->post_id = $id;
            $commentModel->create_time = time();
//            var_dump($commentModel);exit();
            if(Yii::$app->user->isGuest){
                $this->tips_login = "你没有登录，请先登录！谢谢";
            }
            if($commentModel->save()){
               // var_dump($commentModel);exit();
                $this->submit_comment = 1;
            }
        }

        //传递数据到视图
        return $this->render('detail',[
            'model'=>$model,
            'tags'=>$tags,
            'recentComments'=>$recentComments,
            'commentModel'=>$commentModel,
            'submit_comment'=>$this->submit_comment,
            'tips_login'=>$this->tips_login,
        ]);
    }
}
