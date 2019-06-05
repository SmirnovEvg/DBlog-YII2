<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "child_comment".
 *
 * @property int $child_comment_id
 * @property int $comment_id
 * @property string $child_comment_text
 * @property int $user_id
 * @property string $date
 *
 * @property Comment $comment
 * @property User $user
 */
class ChildComment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'child_comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment_id', 'child_comment_text', 'user_id'], 'required'],
            [['comment_id', 'user_id'], 'integer'],
            [['child_comment_text'], 'string'],
            [['date'], 'safe'],
            [['comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['comment_id' => 'comment_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'child_comment_id' => 'Child Comment ID',
            'comment_id' => 'Comment ID',
            'child_comment_text' => 'Child Comment Text',
            'user_id' => 'User ID',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(Comment::className(), ['comment_id' => 'comment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
