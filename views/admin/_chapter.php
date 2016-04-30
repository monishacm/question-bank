<?php
use yii\helpers\Html;
?>

<tr class="even pointer">
    <td class=" "><?= $model->id; ?></td>
    <td class=" "><?= $model->subject->title; ?></td>
    <td class=" "><?= $model->title; ?></td>
    <td class=" "><?= $model->status; ?></td>
    <td class=" last">
        <?= Html::a('<i class="fa fa-edit"></i> Edit',
            ['admin/add-chapter', 'id' => $model->id],
            ['class' => 'btn btn-primary btn-xs']); ?>
		
		
        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Delete</a>
    </td>
</tr>