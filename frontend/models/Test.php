<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Test}}".
 *
 * @property string $user
 * @property int $read
 * @property int $id
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Test}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['read'], 'required'],
            [['read'], 'integer'],
            [['user'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user' => 'User',
            'read' => 'Read',
            'id' => 'ID',
        ];
    }

    /**
     * @inheritdoc
     * @return TestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TestQuery(get_called_class());
    }
}
