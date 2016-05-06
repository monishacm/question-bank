<?php
use yii\helpers\Html;
?>
<tr class="even pointer">
    <td class=" "><?= $model->chapter->title; ?></td>
    <td class=" "><?= $model->qtype; ?></td>
    <td class=" "><?= $model->description; ?></td>
    <td class=" "><?= $model->marks; ?></td>
    <td class=" last">
        <a href="#" class="btn btn-success btn-xs"><i class="fa fa-list"></i> <?= $model->qtype == 'objective' ? "Options" : "Questions"; ?></a>
        <?= Html::a('<i class="fa fa-edit"></i> Edit',
            ['admin/add-question', 'id' => $model->id],
            ['class' => 'btn btn-primary btn-xs']); ?>
        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Delete</a>
    </td>
</tr>