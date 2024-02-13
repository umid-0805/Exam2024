<?php

namespace frontend\controllers;

use common\models\ExamUser;
use common\models\Savollar;
use common\serves\ExamUserServes;
use Yii;
use common\models\Testlar;
use yii\web\Response;

class
ExamController extends BaseController
{

    public function actionTest(): string
    {
        $res = Testlar::find()->andWhere(['is_deleted' => 0])->all();

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
        $model = ExamUser::find()->andWhere(['status' => 1])->andWhere(['created_by' => Yii::$app->user->identity->getId()])->all();

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
