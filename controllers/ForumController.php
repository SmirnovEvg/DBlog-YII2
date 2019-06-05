<?php

namespace app\controllers;

use Yii;
use app\models\Forum;
use app\models\ForumSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\CommentForm;
use app\models\Languages;

/**
 * ForumController implements the CRUD actions for Forum model.
 */
class ForumController extends Controller
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
     * Lists all Forum models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ForumSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $categorys = Languages::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'categorys' => $categorys,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Forum model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $forum = Forum::findOne($id);
        $comments = $forum->comments;
        $commentForm = new CommentForm();

        return $this->render('view', [
            'forum' => $forum,
            'comments' => $comments,
            'commentForm' => $commentForm,
        ]);
    }

    public function actionComment($id)
    {
        $model = new CommentForm();

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveComment($id))
            {
                return $this->redirect(['forum/view', 'id' => $id]);
            }
        }
    }

    public function actionChildComment($id)
    {
        $model = new ChildCommentForm();

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveComment($id))
            {
                return $this->redirect(['forum/view', 'id' => $id]);
            }
        }
    }

    /**
     * Creates a new Forum model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $user = Yii::$app->user->identity->id;
        $model = new Forum();
        $model->user_id = $user;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->forum_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Forum model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->forum_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Forum model.
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
     * Finds the Forum model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Forum the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Forum::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
