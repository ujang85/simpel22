<?php

namespace app\controllers;

use Yii;
use app\models\Kandidat;
use app\models\KandidatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\SqlDataProvider;
/**
 * KandidatController implements the CRUD actions for Kandidat model.
 */
class KandidatController extends Controller
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
     * Lists all Kandidat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KandidatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['user_pemilih' => Yii::$app->user->identity->id]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSkorkpkl()
    {
         $sql = "select pegawai.nama, kandidat.nip_kpkl,concat('`',nip_kpkl) as nip,COUNT(nip_kpkl) as jumlah_kpkl from kandidat 
                Join pegawai on kandidat.nip_kpkl=pegawai.nip
                group by kandidat.nip_kpkl
                order by jumlah_kpkl desc";
        
         $SqlProvider = new SqlDataProvider ([
            'sql' => $sql,
         ]);
          return $this->render('indexkpkl',['SqlProvider'=> $SqlProvider]);
    }

    public function actionSkormedis()
    {
         $sql = "select pegawai.nama, kandidat.nip_medis,concat('`',nip_medis) as nip,COUNT(nip_medis) as jumlah_medis from kandidat 
                Join pegawai on kandidat.nip_medis=pegawai.nip
                group by kandidat.nip_medis
                order by jumlah_medis desc";
        
         $SqlProvider = new SqlDataProvider ([
            'sql' => $sql,
         ]);
          return $this->render('indexmedis',['SqlProvider'=> $SqlProvider]);
    }

    public function actionSkorperawat()
    {
         $sql = "select pegawai.nama, kandidat.nip_perawat,concat('`',nip_perawat) as nip,COUNT(nip_perawat) as jumlah_perawat from kandidat 
                Join pegawai on kandidat.nip_perawat=pegawai.nip
                group by kandidat.nip_perawat
                order by jumlah_perawat desc";
        
         $SqlProvider = new SqlDataProvider ([
            'sql' => $sql,
         ]);
          return $this->render('indexperawat',['SqlProvider'=> $SqlProvider]);
    }

    public function actionSkorumum()
    {
         $sql = "select pegawai.nama, kandidat.nip_umum,concat('`',nip_umum) as nip,COUNT(nip_umum) as jumlah_umum from kandidat 
                Join pegawai on kandidat.nip_umum=pegawai.nip
                group by kandidat.nip_umum
                order by jumlah_umum desc";
        
         $SqlProvider = new SqlDataProvider ([
            'sql' => $sql,
         ]);
          return $this->render('indexumum',['SqlProvider'=> $SqlProvider]);
    }
    /**
     * Displays a single Kandidat model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Kandidat();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
            $model->user_pemilih = Yii::$app->user->identity->id;
            $model->tgl = Yii::$app->formatter->asDate($model->tglsekarang, 'php:Y-m-d');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    /**
     * Creates a new Kandidat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateX()
    {
        $model = new Kandidat();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Kandidat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
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
     * Deletes an existing Kandidat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kandidat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kandidat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kandidat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
