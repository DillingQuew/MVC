<form name="deleted" action="/" method="GET">
    <label for="withDeleted">С удаленными</label>
    <input id="toggle-one" <?php echo (isset($_GET['withDeleted'])) ? "checked" : ""; ?> name="withDeleted" type="checkbox">
</form>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">ID категории</th>
        <th scope="col">Заголовок</th>
        <th scope="col">Цена
        <div>
         по возрастанию
        </div>
        </th>
        <th scope="col">Описание</th>
        <th scope="col">Сортировка</th>
        <th scope="col">Создано</th>
        <th scope="col">Обновлено</th>
        <th scope="col">Удалено</th>
        <th scope="col">Обновить</th>
        <th scope="col">Удалить</th>
    </tr>
    </thead>
    <tbody>

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
    </tbody>
</table>