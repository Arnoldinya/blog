<?php

namespace app\controllers;

use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['update', 'create'],
                        'allow' => true,
                        'roles' => ['admin', 'user'],
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $oArticle = new Article();

        if ($oArticle->load(Yii::$app->request->post())) {
            $oArticle->user_id = Yii::$app->user->identity->id;
            if ($oArticle->save())
               return $this->redirect(['site/article', 'id' => $oArticle->id]);
           
        } else {
            return $this->render('create', [
                'oArticle' => $oArticle,
            ]);
        }

    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $oArticle = $this->findModel($id);

        if ((Yii::$app->user->identity && $oArticle->user_id==Yii::$app->user->identity->id) 
            || Yii::$app->user->can('admin'))
        {
            if ($oArticle->load(Yii::$app->request->post()) && $oArticle->save()) {
                return $this->redirect(['site/article', 'id' => $oArticle->id]);
            } else {
                return $this->render('update', [
                    'oArticle' => $oArticle,
                ]);
            }
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['site/index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
