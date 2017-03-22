<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2017-03-16
 * Time: 21:51
 */
namespace App\components;

use Codeception\Lib\Interfaces\ActiveRecord;
use yii\base\Behavior;

class MyComponent extends Behavior
{
    //为了能够可定制，
    public $attr;

    public function events()
    {
        return [
             ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
             ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
         ];

    }

    public function beforeInsert()
    {
        $model = $this->owner;
        // Use $model->$attr
    }

    public function beforeUpdate()
    {
        $model = $this->owner;
        // Use $model->$attr
    }
}
