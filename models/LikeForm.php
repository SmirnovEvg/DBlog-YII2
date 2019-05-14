<?php

namespace app\models;

use yii\base\Model;
use Yii;

class LikeForm extends Model
{
    public $like;

    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['post_id'], 'required'],
        ];
    }

    public function saveLike($post_id)
    {
        $like = new PostLike;
        $like->user_id = Yii::$app->user->id;
        $like->post_id = $post_id;
        return $like->save();
    }
}