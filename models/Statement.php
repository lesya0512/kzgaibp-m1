<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "statement".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_status
 * @property int $id_category
 * @property int $id_otdel
 * @property string $description
 *
 * @property Category $category
 * @property Otdel $otdel
 * @property Status $status
 * @property User $user
 */
class Statement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_status', 'id_category', 'id_otdel', 'description'], 'required'],
            [['id_user', 'id_status', 'id_category', 'id_otdel'], 'integer'],
            [['description'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['id_status' => 'id']],
            [['id_otdel'], 'exist', 'skipOnError' => true, 'targetClass' => Otdel::class, 'targetAttribute' => ['id_otdel' => 'id']],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_status' => 'Id Status',
            'id_category' => 'Id Category',
            'id_otdel' => 'Id Otdel',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'id_category']);
    }

    /**
     * Gets query for [[Otdel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOtdel()
    {
        return $this->hasOne(Otdel::class, ['id' => 'id_otdel']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'id_status']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
