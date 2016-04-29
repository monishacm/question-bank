<?php
use yii\helpers\Html;
?>
<tr class="even pointer">
    <td class=" "><?= $model->id; ?></td>
    <td class=" "><?= $model->name; ?></td>
    <td class=" "><?= $model->address; ?></td>
    <td class=" "><?= \app\models\SchoolSearch::schoolSubscriptionText($model->getSubscriptions()->where(['>', 'expiry', date("Y-m-d")])->one()); ?></td>
    <td class=" last">
        <a href="#" class="btn btn-success btn-xs"><i class="fa fa-users"></i> Users</a>
        <?= Html::a('<i class="fa fa-edit"></i> Edit',
            ['admin/add-school', 'id' => $model->id],
            ['class' => 'btn btn-primary btn-xs']); ?>
    </td>
</tr>