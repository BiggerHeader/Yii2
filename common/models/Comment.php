<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $content
 * @property int $status
 * @property int $create_time
 * @property int $userid
 * @property string $email
 * @property string $url
 * @property int $post_id
 *@property int $remind
 *
 * @property Post $post
 * @property Commentstatus $status0
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'status', 'userid', 'email', 'post_id'], 'required','message'=>'必须填写不能为空'],
            [['content'], 'string'],
            [['status', 'create_time', 'userid', 'post_id', 'remind'], 'integer'],
            [['email', 'url'], 'string', 'max' => 128],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Commentstatus::className(), 'targetAttribute' => ['status' => 'id']],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID号',
            'content' => '内容',
            'status' => '状态',
            'create_time' => '评论时间',
            'userid' => '评论用户',
            'email' => '用户邮箱',
            'url' => '用户地址',
            'post_id' => '评论文章',
            'remind' => '是否提醒',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Commentstatus::className(), ['id' => 'status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }

    /**
     * 用setter 定义属性值
     * @return string
     */
    public function getComments()
    {
        $content = strip_tags($this->content);
        $content_len = mb_strlen($content);
        return mb_substr($content, 0, 50, 'utf-8') . ($content_len > 50 ? '......' : '');
    }

    /**
     * 回复评论操作
     * @return bool
     */
    public function approve()
    {
        $this->status = 1; //已回复
        return ($this->save()) ? true : false;
    }

    /**
     * 获取未审核的评论  也是使用的getter 和 setter 方法
     * @return int|string
     */
    public static function getNullCommentCount()
    {
        return self::find()->where(['status'=>2])->count();
    }

    /**
     *获取最近评论
     */
    public static  function RecentComment($getCount = 10)
    {
        return self::find()->orderBy("create_time desc")->limit($getCount)->where(['status'=>1])->all();
    }
}
