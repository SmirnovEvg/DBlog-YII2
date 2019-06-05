<?php

namespace app\models;

use yii\base\Model;
use Yii;

class ChildCommentForm extends Model
{
    public $comment;

    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string', 'length' => [3,250]]
        ];
    }

    public function saveChildComment($comment_id)
    {
        $comment = new ChildComment;
        $comment->child_comment_text = $this->comment;
        $comment->user_id = Yii::$app->user->id;
        $comment->comment_id = $comment_id;
        return $comment->save();
    }
}