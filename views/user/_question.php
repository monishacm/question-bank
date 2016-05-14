<?php
use yii\helpers\Html;
?>
<tr class="even pointer">
    <td class=" "><?= $model->chapter->title; ?></td>
    <td class=" "><?= $model->qtype; ?></td>
    <td class=" "><?= $model->description; ?></td>
    <td class=" "><?= $model->marks; ?></td>
    <td class=" last">
        <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#ta-question-modal-<?= $model->id ?>"><i class="fa fa-list"></i> <?= $model->qtype == 'objective' ? "Options" : "Questions"; ?></a>
        <?= Html::a('<i class="fa fa-edit"></i> Edit',
            ['user/add-question', 'id' => $model->id],
            ['class' => 'btn btn-primary btn-xs']); ?>
        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Delete</a>
        <div class="modal fade" id="ta-question-modal-<?= $model->id ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title"><?= $model->qtype == 'objective' ? "Options" : "Questions"; ?></h4>
                    </div>
                    <div class="modal-body">
                        <?php $i = 1; foreach($model->options as $option) {?>
                        <p>
                            <?php if ($model->qtype == 'objective') { ?>
                            <b>Option <?= $i ?></b> (Correct Answer: <?= $option->correct_answer == 'y' ? "Yes" : "No" ?>)<br />
                            <?php } else {?>
                            <b>Question <?= $i ?></b> (Marks: <?= $option->marks; ?>)<br />
                            <?php } ?>
                            <?= $option->description ?>
                        </p>
                        <?php }?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </td>
</tr>