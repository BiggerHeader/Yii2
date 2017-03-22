<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property int $id
 * @property string $name
 * @property int $frequency
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['frequency'], 'integer'],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'frequency' => 'Frequency',
        ];
    }

    /**
     * string  to array
     * @param $sting
     * @return array
     */
    public static function stringToarray($sting)
    {
        if (!$sting) {
            return [];
        }
        //用正则表达式分割字符串
        return preg_split('/\s*,\s*/', trim($sting), -1, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * @param $array
     * @return string
     */
    public static function arrayTostring($array)
    {
        return implode(',', $array);
    }

    /**
     * 添加标签
     * @param $tags
     */
    public static function addTags($tags)
    {
        if (empty($tags)) {
            return;
        }

        foreach ($tags as $tag) {
            $tagObject = Tag::find()->where(['name' => $tag])->one();
            $tagCount = Tag::find()->where(['name' => $tag])->count();
            //判断标签是否存在 ，没有就创建标签
            if (!$tagCount) {
                $new_tag = new Tag();
                $new_tag->name = $tag;
                $new_tag->frequency = 1;
                $new_tag->save();
            } else {
                $tagObject->frequency += 1;
                $tagObject->save();
            }
        }

    }

    /**
     * 移除标签
     * @param $tags
     */
    public static function removeTag($tags)
    {
        if (empty($tags)) {
            return;
        }
        /*var_dump($tags);
        exit();*/
        foreach ($tags as $tag) {
            $tagObject = Tag::find()->where(['name' => $tag])->one();
            $tagCount = Tag::find()->where(['name' => $tag])->count();
            // echo  $tagCount ;exit();
            if ($tagCount) {
                if ($tagCount && $tagObject->frequency - 1 <= 0) {
                    $tagObject->delete();
                } else {
                    $tagObject->frequency -= 1;
                    $tagObject->save();
                }
            }
        }
    }

    /**
     * @param $oldtags
     * @param $newtags
     */
    public static function updateTags($oldtags, $newtags)
    {
        if (!empty($newtags) || !empty($oldtags)) {
            $newtagsArray = self::stringToarray($newtags);
            $oldtagsArray = self::stringToarray($oldtags);
            //计算数组的差集 ，第一个数组中有，而其他素组中有的元素
            //  var_dump(array_values(array_diff($newtagsArray, $oldtagsArray)));
            self::addTags(array_values(array_diff($newtagsArray, $oldtagsArray)));
            self::removeTag(array_values(array_diff($oldtagsArray, $newtagsArray)));
        }
    }

    /**
     * 获取所有标签 ，并设定权值 ，按权值大小展示
     * @return array
     */
    public static function findTagWeight($limit = 20)
    {
        //吧标签分为五个当次、
        $tags_level = 5;
        //取出排好序数据
        $models = self::find()->orderBy('frequency desc')->limit($limit)->all();
        //
        $total = self::find()->limit($limit)->count();
        $stepper = ceil($total/$tags_level );

        //要返回的标签
        $tags = array();
        $counter = 1;
        if ($total > 0) {
            foreach ($models as $model) {
                $weight = ceil($counter / $stepper);
                $tags[$model->name] = $weight;
                $counter ++;

             /* $weigth = floor($model->frequency/$sum*$tags_level) +1;
              $tags[$model->name]=$weigth;*/
            }
            ksort($tags);

        }
        //var_dump($tags);exit();
        return $tags;
    }
}









