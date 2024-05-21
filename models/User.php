<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int $id_otdel
 * @property string $fio
 * @property string $phone
 * @property string $email
 * @property string $username
 * @property string $password
 *
 * @property Otdel $otdel
 * @property Statement[] $statements
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_otdel', 'fio', 'phone', 'email', 'username', 'password'], 'required'],
            [['id_otdel'], 'integer'],
            [['fio', 'phone', 'email', 'username', 'password'], 'string', 'max' => 255],
            [['id_otdel'], 'exist', 'skipOnError' => true, 'targetClass' => Otdel::class, 'targetAttribute' => ['id_otdel' => 'id']],
            [['password'], 'string', 'min' => 6, 'tooShort'=>'не менее 6 символов'],
            [['fio'], 'match', 'pattern' => "/[а-яёА-ЯЁ]/u", 'message' => 'только кириллица'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_otdel' => 'Id Otdel',
            'fio' => 'Fio',
            'phone' => 'Phone',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
        ];
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
     * Gets query for [[Statements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatements()
    {
        return $this->hasMany(Statement::class, ['id_user' => 'id']);
    }

    // регистрация !!!

      /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

        return;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::find()->where(['username'=>$username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
