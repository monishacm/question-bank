<?php

namespace app\controllers;

use app\models\Exam;
use app\models\ExamSearch;
use app\models\School;
use app\models\SchoolQuestion;
use app\models\SchoolQuestionOption;
use app\models\SchoolQuestionSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function init() {
        $this->layout = "school";
    }

    public function actionIndex() {
        return $this->render("index");
    }

    public function actionQuestions($page = 0) {
        $searchModel = new SchoolQuestionSearch();
        if($page > 0) $page --;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, Yii::$app->session['user']['school_id'], $page);

        return $this->render('questions', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAddQuestion($id = 0) {
        if($id > 0) {
            $model = SchoolQuestion::findOne($id);
        }
        else {
            $model = new SchoolQuestion();
        }
        $questionOption = new SchoolQuestionOption();

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()) {
                foreach(Yii::$app->request->post()['SchoolQuestionOption'] as $option) {
                    if(empty($option['description'])) {
                        continue;
                    }
                    if(isset($option['id'])) {
                        $opModel = SchoolQuestionOption::findOne($option['id']);
                    }
                    else {
                        $opModel = new SchoolQuestionOption();
                        $opModel->school_question_id = $model->id;
                    }
                    $opModel->load(array('SchoolQuestionOption' => $option));
                    $opModel->save();
                }

                return $this->redirect(['questions']);
            }
            else {
                print_r($model->getErrors());
            }
        } else {
            return $this->render('add_question', [
                'model' => $model,
                'questionOption' => $questionOption
            ]);
        }
    }

    public function actionSchoolInfo() {
        $id = Yii::$app->session['user']['school_id'];
        if($id > 0) {
            $model = School::findOne($id);
        }
        else {
            return $this->redirect(["index"]);
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
        }

        return $this->render('add_school', [
            'model' => $model,
        ]);
    }

    public function actionExams() {
        $schoolId = Yii::$app->session['user']['school_id'];
        $searchModel = new ExamSearch();
        $dataProvider = $searchModel->search($schoolId, Yii::$app->request->queryParams);

        return $this->render('exams', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAddExam($id = 0) {
        if($id > 0) {
            $model = Exam::findOne($id);
        }
        else {
            $model = new Exam();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['exams']);
        } else {
            return $this->render('add_exam', [
                'model' => $model,
            ]);
        }
    }
}
