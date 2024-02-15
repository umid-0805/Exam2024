<?php

namespace frontend\controllers;

use common\models\ExamUser;
use common\models\Option;
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
        $res = Testlar::find()->andWhere(['is_deleted' => 0])->andWhere(['date' => date('Y-m-d')])->all();

        return $this->render('test', [
            'model' => $res
        ]);
    }

    public function actionTests(int $id): Response|string
    {

        $query = ExamUser::find()
            ->leftJoin('savollar', 'exam_user.savollar_id = savollar.id')
            ->andWhere(['savollar.test_id' => $id])
            ->andWhere(['exam_user.created_by' => getUserId()])
           // ->andWhere(['is_deleted' => 0])
            ->all();

        if ($query){
            return  $this->redirect(['test']);

        }

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

    public function actionView($id): string
    {
        $model = ExamUser::find()
            ->leftJoin('savollar', 'exam_user.savollar_id = savollar.id')
            ->andWhere(['savollar.test_id' => $id])
            ->andWhere(['savollar.status' => 10])
            ->andWhere(['exam_user.created_by' => getUserId()])
            ->all();

        return $this->render('view', [
            'model' => $model,

        ]);
    }
}
