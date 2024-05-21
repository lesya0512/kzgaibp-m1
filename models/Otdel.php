<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "otdel".
 *
 * @property int $id
 * @property string $otdel
 *
 * @property Statement[] $statements
 * @property User[] $users
 */
class Otdel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'otdel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['otdel'], 'required'],
            [['otdel'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'otdel' => 'Otdel',
        ];
    }

    /**
     * Gets query for [[Statements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatements()
    {
        return $this->hasMany(Statement::class, ['id_otdel' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['id_otdel' => 'id']);
    }
}
