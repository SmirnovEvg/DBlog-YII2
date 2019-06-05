<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $comment_id
 * @property int $forum_id
 * @property int $user_id
 * @property string $comment
 * @property string $date
 *
 * @property ChildComment[] $childComments
 * @property Forum $forum
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['forum_id', 'user_id', 'comment'], 'required'],
            [['forum_id', 'user_id'], 'integer'],
            [['comment'], 'string'],
            [['date'], 'safe'],
            [['forum_id'], 'exist', 'skipOnError' => true, 'targetClass' => Forum::className(), 'targetAttribute' => ['forum_id' => 'forum_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'forum_id' => 'Forum ID',
            'user_id' => 'User ID',
            'comment' => 'Comment',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildComments()
    {
        return $this->hasMany(ChildComment::className(), ['comment_id' => 'comment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForum()
    {
        return $this->hasOne(Forum::className(), ['forum_id' => 'forum_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
    }
}
