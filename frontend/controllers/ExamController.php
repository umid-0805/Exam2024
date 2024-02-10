<?php

namespace frontend\controllers;

use common\models\ExamUser;
use common\models\Option;
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

        return $this->render('savol', [
            'model' => Savollar::findByTestId($id),
            'test_id' => $id
        ]);
    }


    public function actionJavob(): void
    {
        $name = $_GET['name'];

        $res = Savollar::find()->where(['option' => $name])->all();
    }

    public function actionCreate()
    {

        if ($this->request->isPost) {
            $ddd = Yii::$app->request->post();

            foreach ($ddd as $key => $value) {
                if ($key !== '_csrf-frontend'){
                    $savol = Option::findOne((int)$value);
                    $model = new ExamUser();
                    $model->savollar_id = $savol->savollar_id;
                    $model->option_id = (int)$value;
                    $model->status = 1;
                    $model->save(false);
                    setFlash('success','saqlandi');
                }

            }

            return  $this->redirect(['tests', 'id' => 6]);
        }
    }

    public function actionView(): string
    {
        $natija = new ExamUser();

        if ($natija->load(Yii::$app->request->post())) {

            $natija->savollar_id = 5;
            $natija->option_id = 1;
            $natija->success_answer = 2;

            $natija->save();

        }


        return $this->render('view', [
            'answer_count' => 1,
            'natija' => $natija,
        ]);
    }
}
