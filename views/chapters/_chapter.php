<tr class="even pointer">
    <td class=" "><?= $model->id; ?></td>
    <td class=" "><?= $model->getSubject()->title; ?></td>
    <td class=" "><?= $model->title; ?></td>
    <td class=" "><?= $model->status; ?></td>
    <td class=" last">
        <a href="#">Edit</a>
        <a href="#">Delete</a>
    </td>
</tr>