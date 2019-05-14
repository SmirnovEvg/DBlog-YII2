<?php

namespace app\models;

use yii\base\Model;
use Yii;

class CommentForm extends Model
{
    public $comment;

    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string', 'length' => [3,250]]
        ];
    }

    public function saveComment($forum_id)
    {
        $comment = new Comment;
        $comment->comment = $this->comment;
        $comment->user_id = Yii::$app->user->id;
        $comment->forum_id = $forum_id;
        return $comment->save();
    }
}