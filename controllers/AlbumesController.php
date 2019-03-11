<?php

namespace app\controllers;

use app\models\Albumes;
use app\models\AlbumesCanciones;
use app\models\AlbumesSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * AlbumesController implements the CRUD actions for Albumes model.
 */
class AlbumesController extends Controller
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
            'access' => [
                'class' => AccessControl::class,
                'only' => ['delete'],
                'rules' => [
                    [
                        'allow' => false,
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Albumes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlbumesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $canciones = AlbumesCanciones::find()
        ->where(['album_id' => $this->id]);

        $duraciontotal = 0;

        foreach ($canciones as $cancion) {
            $duraciontotal = $duraciontotal + $cancion->cancion->duracion;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'duraciontotal' => $duraciontotal,
        ]);
    }

    /**
     * Displays a single Albumes model.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $canciones = AlbumesCanciones::find()->where(['album_id' => $id])->asArray();
        $artistas = ArtistasCanciones::find()->where(['album_id' => $id])->asArray();
        return $this->render('view', [
            'canciones' => $canciones,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Albumes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Albumes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Albumes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Albumes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Albumes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Albumes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Albumes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Calculo duracion total basandome en la duracion de todas las canciones de
     * ese album.
     * @return Canciones
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCalcular()
    {
        $canciones = AlbumesCanciones::find()
        ->where(
            ['album_id' => $this->id]
        );
        var_dump($canciones);
        die();
    }
}
