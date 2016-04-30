<?php

use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchoolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Users</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <a class="btn btn-primary btn-xs" href="<?php echo Yii::$app->urlManager->createUrl("admin/add-user"); ?>">Add User</a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title" style="display: table-cell;">Id </th>
                        <th class="column-title" style="display: table-cell;">Name </th>
                        <th class="column-title" style="display: table-cell;">Phone </th>
                        <th class="column-title" style="display: table-cell;">Email </th>
                        <th class="column-title" style="display: table-cell;">Roll </th>
                        <th class="column-title no-link last" style="display: table-cell;"><span class="nobr">Actions</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?= ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemView' => '_user'
                    ]); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>