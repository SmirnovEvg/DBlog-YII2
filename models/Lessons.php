<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $post_id
 * @property string $language
 * @property string $name
 * @property string $content
 * @property string $type
 * @property string $date
 *
 * @property PostLikes[] $postLikes
 * @property User[] $users
 */
class Lessons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['language', 'name', 'content', 'type'], 'required'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['language', 'name', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'language' => 'Language',
            'name' => 'Name',
            'content' => 'Content',
            'type' => 'Type',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostLikes()
    {
        return $this->hasMany(PostLikes::className(), ['post_id' => 'post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('post_likes', ['post_id' => 'post_id']);
    }
}
