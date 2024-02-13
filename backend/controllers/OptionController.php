<?php

namespace backend\controllers;

use common\helpers\ExeptionConstations\Constations;
use common\models\Option;
use common\models\Savollar;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * OptionController implements the CRUD actions for Option model.
 */
class OptionController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Option models.
     *
     * @return string
     */
    public function actionIndex($savol_id)
    {
        $search = \Yii::$app->request->get('search');

        $ma = Option::find()
            ->orderBy(['id' => SORT_DESC])
            ->orFilterWhere(['like', 'name', $search])
            ->orFilterWhere(['like', 'option', $search])
            ->andWhere(['is_deleted' => 0])
            ->andWhere(['savollar_id' => $savol_id])
            ->limit(5)->all();

        return $this->render('index', [
            'model' => $ma,
            'savol_id' => $savol_id,
            'search' => $search
        ]);
    }

    /**
     * Displays a single Option model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id): string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Option model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|Response
     */
    public function actionCreate($test_id): Response|string
    {
        $model = new Option();

        $count = Option::find()->andWhere(['savollar_id' => $test_id])->andWhere(['is_deleted' => 0])->count();

        if ($count >= 5) {
            \Yii::$app->session->setFlash('error', "5 tadan ortiq kiritib bulmaydi!");
            return $this->redirect(['index', 'savol_id' => $test_id]);
        }


        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->savollar_id = $test_id;
                $model->is_deleted = 0;
                $model->save(false);
                \Yii::$app->session->setFlash('success', Constations::SUCCESS_MESSAGE);
                return $this->redirect(['index', 'savol_id' => $test_id]);
            }
        } else {

            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'savol_id' => $test_id
        ]);
    }

    /**
     * Updates an existing Option model.
     *
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate(int $id): Response|string
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionConfirmation($id)
    {
       $savol = Savollar::findOne($id);
       $savol->statusActive();

       return $this->redirect(['index', 'savol_id'=> $savol->id]);
    }
    /**
     * Deletes an existing Option model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete(int $id): Response
    {

        $this->findModel($id)->deleted();

        return $this->redirect(['index', 'savol_id'=> $this->findModel($id)->savollar_id]);
    }


    /**
     * @throws NotFoundHttpException
     */
    public function actionStatus($id, $status ): Response
    {
        $savol = $this->findModel($id)->savollar_id;

        if (!Option::isTrue($savol, $status)){
            return $this->redirect(['index','savol_id'=> $savol]);
        }

        $this->findModel($id)->statusActive();

        return $this->redirect(['index','savol_id'=> $savol]);

    }
    /**
     * Finds the Option model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Option the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): Option
    {
        if (($model = Option::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
