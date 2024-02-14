<?php

namespace frontend\models;

use common\helpers\person\personFactory;
use common\helpers\user\userFactory;
use Yii;
use yii\base\Model;
use yii\db\Exception;
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $lastName;
    public $firstName;
    public $phone;


    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            [['lastName', 'firstName', 'phone'], 'string', 'max' => 255],
            ['password', 'required'],
            ['lastName','required'],
            ['firstName','required'],
            ['phone', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

        ];
    }

    /**
     * @throws Exception
     */
    public function signup(): bool
    {
        $tr = Yii::$app->db->beginTransaction();

        try {
            $user = $this->getUserFactory()->userCreateAndSave($this->username, $this->password, $this->email);
            if (!$user->save()){throw new Exception('user err'); }

            $person = $this->getPersonFactory()->personCreateAndSave(
                $user->id,
                $this->lastName,
                $this->firstName,
                $this->phone
            );

            if (!$person->save()){throw new Exception('There was an error with your personal information    '); }

            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            $tr->commit();
            return true;
        }catch (\Exception $e){
            Yii::$app->session->setFlash('error', 'Thank you for registration. Please check your inbox for verification email.');
            $tr->rollBack();
            throw $e;
        }
    }

    private function getUserFactory(): userFactory
    {
        return new userFactory();
    }

    private function getPersonFactory(): personFactory
    {
        return new personFactory();
    }
}
