<tr class="even pointer">
    <td class=" "><?= $model->id; ?></td>
    <td class=" "><?= $model->chapter->title; ?></td>
    <td class=" "><?= $model->qtype; ?></td>
    <td class=" "><?= $model->description; ?></td>
    <td class=" "><?= $model->marks; ?></td>
    <td class=" last">
        <a href="#" class="btn btn-success btn-xs"><i class="fa fa-list"></i> Options</a>
        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Delete</a>
    </td>
</tr>