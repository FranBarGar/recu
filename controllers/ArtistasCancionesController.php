<?php

namespace app\controllers;

use Yii;
use app\models\ArtistasCanciones;
use app\models\ArtistasCancionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArtistasCancionesController implements the CRUD actions for ArtistasCanciones model.
 */
class ArtistasCancionesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ArtistasCanciones models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArtistasCancionesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArtistasCanciones model.
     * @param integer $artista_id
     * @param integer $cancion_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($artista_id, $cancion_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($artista_id, $cancion_id),
        ]);
    }

    /**
     * Creates a new ArtistasCanciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArtistasCanciones();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'artista_id' => $model->artista_id, 'cancion_id' => $model->cancion_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ArtistasCanciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $artista_id
     * @param integer $cancion_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($artista_id, $cancion_id)
    {
        $model = $this->findModel($artista_id, $cancion_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'artista_id' => $model->artista_id, 'cancion_id' => $model->cancion_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ArtistasCanciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $artista_id
     * @param integer $cancion_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($artista_id, $cancion_id)
    {
        $this->findModel($artista_id, $cancion_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArtistasCanciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $artista_id
     * @param integer $cancion_id
     * @return ArtistasCanciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($artista_id, $cancion_id)
    {
        if (($model = ArtistasCanciones::findOne(['artista_id' => $artista_id, 'cancion_id' => $cancion_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
