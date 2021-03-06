<?php

namespace common\modules\message\models;

use Yii;

/**
 * This is the model class for table "tbl_chat_group".
 *
 * @property int $chat_group_id
 * @property string $group_name
 * @property int $createdby_userid
 * @property string $created_datetime
 *
 * @property GroupMember[] $groupMembers
 */
class ChatGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_chat_group';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('messagedb');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['createdby_userid'], 'integer'],
            [['created_datetime'], 'safe'],
            [['group_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'chat_group_id' => 'Chat Group ID',
            'group_name' => 'Group Name',
            'createdby_userid' => 'Createdby Userid',
            'created_datetime' => 'Created Datetime',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupMembers()
    {
        return $this->hasMany(GroupMember::className(), ['chat_group_id' => 'chat_group_id']);
    }
}
