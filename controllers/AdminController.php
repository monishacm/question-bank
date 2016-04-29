<?php

namespace app\controllers;

use Yii;
use app\models\SchoolSearch;
use app\models\ClassesSearch;
use app\models\SubjectSearch;
use app\models\ChapterSearch;
use app\models\QuestionSearch;
use app\models\School;
use app\models\Question;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * SubjectController implements the CRUD actions for Subject model.
 */
class AdminController extends Controller
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
        ];
    }

    /**
     * Lists all Subject models.
     * @return mixed
     */
    public function actionSchools() {

        $searchModel = new SchoolSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('schools', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAddSchool($id = 0) {
        if($id > 0) {
            $model = School::findOne($id);
        }
        else {
            $model = new School();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('add_school', [
                'model' => $model,
            ]);
        }
    }

    public function actionClasses() {
        $searchModel = new ClassesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('classes', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSubjects() {
        $searchModel = new SubjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('subjects', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionChapters() {
        $searchModel = new ChapterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('chapters', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTaQuestions() {
        $searchModel = new QuestionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('ta_questions', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAddQuestion() {
        $model = new Question();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('add_question', [
                'model' => $model,
            ]);
        }
    }

    public function actionSchoolQuestions() {
        $searchModel = new ChapterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('chapters', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
