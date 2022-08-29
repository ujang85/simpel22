<?php

namespace app\controllers;

use Yii;
use app\models\Penilaian;
use app\models\PenilaianSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * PenilaianController implements the CRUD actions for Penilaian model.
 */
class PenilaianPerawatController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Penilaian models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new PenilaianSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['group2' => 'PERAWAT']);
        $dataProvider->query->andFilterWhere(['id_penilai' => Yii::$app->user->identity->id]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Penilaian model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Penilaian #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    
    /**
     * Creates a new Penilaian model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Penilaian();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Input Penilaian",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post())){


                    $totalOP = $model->op_1 + $model->op_2 + $model->op_3 + $model->op_4 + $model->op_5 + $model->op_6 + $model->op_7;
                    $totalKO = $model->ko_1 + $model->ko_2 + $model->ko_3 + $model->ko_4 + $model->ko_5 + $model->ko_6 + $model->ko_7;
                    $totalIK = $model->ik_1 + $model->ik_2 + $model->ik_3;
                    $totalKJ = $model->kj_1 + $model->kj_2 + $model->kj_3 + $model->kj_4 + $model->kj_5;

                     $model->id_penilai = Yii::$app->user->identity->id;
                     $model->tgl_input = Yii::$app->formatter->asDate($model->tglsekarang, 'php:Y-m-d');
                     $model->id_pegawai = $model->id_pegawai;

                     $model->op_1 = $model->op_1;
                     $model->op_2 = $model->op_2;
                     $model->op_3 = $model->op_3;
                     $model->op_4 = $model->op_4;
                     $model->op_5 = $model->op_5;
                     $model->op_6 = $model->op_6;
                     $model->op_7 = $model->op_7;
                     
                     $model->ko_1 = $model->ko_1;
                     $model->ko_2 = $model->ko_2;
                     $model->ko_3 = $model->ko_3;
                     $model->ko_4 = $model->ko_4;
                     $model->ko_5 = $model->ko_5;
                     $model->ko_6 = $model->ko_6;
                     $model->ko_7 = $model->ko_7;
                    
                     $model->ik_1 = $model->ik_1;
                     $model->ik_2 = $model->ik_2;
                     $model->ik_3 = $model->ik_3;
                     
                     $model->kj_1 = $model->kj_1;
                     $model->kj_2 = $model->kj_2;
                     $model->kj_3 = $model->kj_3;
                     $model->kj_4 = $model->kj_4;
                     $model->kj_5 = $model->kj_5;
                     
                     $model->total_op = $totalOP;
                     $model->total_ko = $totalKO;
                     $model->total_ik = $totalIK;
                     $model->total_kj =$totalKJ;
                     $model->subtotal =$totalOP + $totalKO + $totalIK + $totalKJ;
                     $model->group2 = "PERAWAT";
                     $model->save();
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Input Penilaian",
                    'content'=>'<span class="text-success">Create Penilaian success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"])
                ];         
            }else{           
                return [
                    'title'=> "Input Penilaian",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing Penilaian model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Penilaian #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post())){


                    $totalOP = $model->op_1 + $model->op_2 + $model->op_3 + $model->op_4 + $model->op_5 + $model->op_6 + $model->op_7;
                    $totalKO = $model->ko_1 + $model->ko_2 + $model->ko_3 + $model->ko_4 + $model->ko_5 + $model->ko_6 + $model->ko_7;
                    $totalIK = $model->ik_1 + $model->ik_2 + $model->ik_3;
                    $totalKJ = $model->kj_1 + $model->kj_2 + $model->kj_3 + $model->kj_4 + $model->kj_5;

                     $model->id_penilai = Yii::$app->user->identity->id;
                     $model->tgl_input = Yii::$app->formatter->asDate($model->tglsekarang, 'php:Y-m-d');
                     $model->id_pegawai = $model->id_pegawai;

                     $model->op_1 = $model->op_1;
                     $model->op_2 = $model->op_2;
                     $model->op_3 = $model->op_3;
                     $model->op_4 = $model->op_4;
                     $model->op_5 = $model->op_5;
                     $model->op_6 = $model->op_6;
                     $model->op_7 = $model->op_7;
                     
                     $model->ko_1 = $model->ko_1;
                     $model->ko_2 = $model->ko_2;
                     $model->ko_3 = $model->ko_3;
                     $model->ko_4 = $model->ko_4;
                     $model->ko_5 = $model->ko_5;
                     $model->ko_6 = $model->ko_6;
                     $model->ko_7 = $model->ko_7;
                    
                     $model->ik_1 = $model->ik_1;
                     $model->ik_2 = $model->ik_2;
                     $model->ik_3 = $model->ik_3;
                     
                     $model->kj_1 = $model->kj_1;
                     $model->kj_2 = $model->kj_2;
                     $model->kj_3 = $model->kj_3;
                     $model->kj_4 = $model->kj_4;
                     $model->kj_5 = $model->kj_5;
                     
                     $model->total_op = $totalOP;
                     $model->total_ko = $totalKO;
                     $model->total_ik = $totalIK;
                     $model->total_kj =$totalKJ;
                     $model->subtotal =$totalOP + $totalKO + $totalIK + $totalKJ;
                     $model->group2 = "PERAWAT";
                     $model->save();
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Penilaian #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"])
                ];    
            }else{
                 return [
                    'title'=> "Update Penilaian #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Penilaian model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing Penilaian model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the Penilaian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Penilaian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Penilaian::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
