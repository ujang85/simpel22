<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $hak_akses
 * @property int|null $unit
 */
class User2 extends \yii\db\ActiveRecord
{
    public $new_password, $old_password, $repeat_password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    /*
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at', 'hak_akses', 'unit'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    } */
    public function rules()
    {
        return [
            [['username', 'email'], 'required'],
            [['username', 'email', 'password_hash'], 'string', 'max' => 255],
            [['username', 'email'], 'unique'],
            [['email'], 'email'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            ['status','integer'],
            [['old_password', 'new_password', 'repeat_password'], 'string', 'min' => 6],
            [['repeat_password'], 'compare', 'compareAttribute' => 'new_password'],
            [['old_password', 'new_password', 'repeat_password'], 'required', 'when' => function ($model) {
                return (!empty($model->new_password));
            }, 'whenClient' => "function (attribute, value) {
                return ($('#user-new_password').val().length>0);
            }"],
            //['username', 'filter', 'filter' => 'trim'],
            //['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['password'] = ['old_password', 'new_password', 'repeat_password'];
        return $scenarios;
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
         //   'hak_akses' => 'Hak Akses',
        //    'unit' => 'Unit',
        ];
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    
    public function getDataunit()
    {
        return $this->hasOne(Unit::className(),[ 'id'=>'unit' ]);
    }
    public function getDataakses()
    {
        return $this->hasOne(Akses::className(),[ 'id'=>'hak_akses' ]);
    }
    /**
     * {@inheritdoc}
     * @return User2Query the active query used by this AR class.
     */
    public function getRoles()
    {
        return $this->hasMany(AuthAssignment::className(), [
            'user_id' => 'id',
        ]);
    }
    public static function find()
    {
        return new User2Query(get_called_class());
    }
}
