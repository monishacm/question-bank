<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchoolQuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'School Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-question-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create School Question', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'school_id',
            'chapter_id',
            'added_by',
            'description:ntext',
            // 'qtype',
            // 'marks',
            // 'status',
            // 'created_date',
            // 'deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
