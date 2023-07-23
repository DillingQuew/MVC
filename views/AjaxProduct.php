<?php foreach ($data as $obj) { ?>
    <tr>
        <td><?=$obj['id']?></td>
        <td><?=$obj['category_id']?></td>
        <td><?=$obj['title']?></td>
        <td><?=$obj['price']?> р.</td>
        <td><?=$obj['description']?></td>
        <td><?=$obj['sort']?></td>
        <td><?=$obj['created_at']?></td>
        <td><?=$obj['updated_at']?></td>
        <td><?=$obj['deleted_at']?></td>
        <td><a class="link-primary" href="/main/update?id=<?= $obj['id'];?>">Обновить</a></td>
        <td><a class="link-danger" href="/main/delete?id=<?= $obj['id'];?>">Удалить</a></td>
    </tr>
<?php } ?>