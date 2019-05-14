<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forum".
 *
 * @property int $forum_id
 * @property string $name
 * @property string $text
 * @property int $user_id
 * @property string $date
 * @property int $language
 *
 * @property Comment[] $comments
 * @property User $user
 * @property Languages $language0
 */
class Forum extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forum';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'text', 'user_id', 'language'], 'required'],
            [['text'], 'string'],
            [['user_id', 'language'], 'integer'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['language'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['language' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'forum_id' => 'Forum ID',
            'name' => 'Name',
            'text' => 'Text',
            'user_id' => 'User ID',
            'date' => 'Date',
            'language' => 'Language',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['forum_id' => 'forum_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage0()
    {
        return $this->hasOne(Languages::className(), ['id' => 'language']);
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
    }
}
