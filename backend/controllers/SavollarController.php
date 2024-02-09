<?php

namespace backend\controllers;


use backend\models\forms\SavollarCreateForm;
use common\models\Savollar;
use common\models\search\SavollarSearch;
use common\serves\SavollarServes;
use http\Client\Response;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * SavollarController implements the CRUD actions for Savollar model.
 */
class SavollarController extends Controller
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
     * Lists all Savollar models.
     *
     * @return string
     */
    public function actionIndex($test_id)
    {
        $searchModel = new SavollarSearch();
        $searchModel->test_id = $test_id;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'test_id' => $test_id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Savollar model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Savollar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($test)
    {
        $model = new SavollarCreateForm();

        if ($this->request->isPost) {
            $serves = new SavollarServes($model);
            if ($model->load($this->request->post())) {
                $serves->saveData($test);
                return $this->redirect(['index', 'test_id' => $test]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Savollar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Savollar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id): Response
    {
        $model = $this->findModel($id);
        $test_id = $model->test_id;
        $model->delete();

        return $this->redirect(['index', 'test_id' => $test_id]);
    }

    /**
     * Finds the Savollar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Savollar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): Savollar
    {
        if (($model = Savollar::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
