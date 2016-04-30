<?php
use yii\helpers\Html;
?>
<tr class="even pointer">
    <td class=" "><?= $model->id; ?></td>
    <td class=" "><?= $model->full_name; ?></td>
    <td class=" "><?= $model->phone_no; ?></td>
    <td class=" "><?= $model->email; ?></td>
    <td class=" "><?= $model->roll; ?></td>
    <td class=" last">
        <?= Html::a('<i class="fa fa-edit"></i> Edit',
            ['admin/add-user', 'id' => $model->id],
            ['class' => 'btn btn-primary btn-xs']); ?>
        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Delete</a>
    </td>
</tr>