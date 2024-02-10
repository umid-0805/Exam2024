<?php

namespace frontend\controllers;

use common\models\ExamUser;
use common\models\Option;
use common\models\Savollar;
use common\serves\ExamUserServes;
use Yii;
use common\models\Testlar;
use common\models\TestUser;
use yii\web\Response;

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

    public function actionCreate(): Response|string
    {
        $model = new ExamUserServes;

        if ($this->request->isPost) {
            $post = Yii::$app->request->post();
            $model->saveDate($post);

            return  $this->redirect(['view']);
        }

        return 'error';
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
