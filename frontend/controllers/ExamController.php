<?php

namespace frontend\controllers;

use common\models\Savollar;
use Yii;
use common\models\Testlar;
use common\models\TestUser;

class
ExamController extends BaseController
{

    public function actionTest(): string
    {   
        $res = Testlar::find()->all();

        return $this->render('test', [
            'model' => $res
        ]);
    }

    public function actionTests(int $id): string
    {

        return $this->render('savol',[
            'model' => Savollar::findByTestId($id),
            'test_id' => $id
        ]);
    }


    public function actionJavob(): void
    {
        $name = $_GET['name'];

        $res = Savollar::find()->where(['option' => $name])->all();
    }

    public function actionView($test_id): string
    {
        $post = Yii::$app->request->post();
      
        $savollar = Savollar::findAll(['test_id' => $test_id]);
        $answer_count = 0;

        foreach ($savollar as $value) {
            if (isset($post['savol' . $value->id]) && $value->success_answer == $post['savol' . $value->id]) {
                $answer_count++;
            }
        }

        $natija = new TestUser();
        $natija->user_id = Yii::$app->user->id;
        $natija->testlar_id = $test_id;
        $natija->success_count  = $answer_count;
        $natija->end_date = date('Y-m-d H:i:s');
       
        $natija->save(false);
        

        return $this->render('view',[
            'answer_count' => $answer_count,
            'natija'=>$natija,
      
            
            
        ]);
     }
}
