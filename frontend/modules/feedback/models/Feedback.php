<?php

namespace app\modules\feedback\models;

use app\modules\feedback\components\ModerationBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Feedback extends \yii\db\ActiveRecord
{

    public $verifyCode;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'message'], 'required'],
            [['message'], 'string'],
            [['status'], 'integer'],
            [['status'], 'default', 'value' => ModerationBehavior::PROCCESS],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
            ['name', 'match', 'pattern' => "/^[а-яА-ЯёЁa-zA-Z\s'`]+$/iu", 'message' => 'Недопустимое имя'],
            ['email', 'email', 'message' => "Электронная почта неверна"],
            ['phone', 'match', 'pattern' => "/^[\+]?[(]?[998]{3}[)]?[0-9]{9}$/i", 'message' => 'Недопустимое номер (например: +998941112233)'],
            ['message', 'filter', 'filter' => function ($value) {
                return strip_tags($value);
            }],
            ['verifyCode', 'captcha', 'captchaAction' => '/feedback/send/captcha']
        ];
    }


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                // 'value' => new Expression('NOW()'),
            ],
            [
                'class' => ModerationBehavior::class
            ]
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'message' => 'Message',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verifyCode' => "Verification code"
        ];
    }
}
