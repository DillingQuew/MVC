<form name="deleted" action="/" method="GET">
    <label for="withDeleted">С удаленными</label>
    <input id="toggle-one" <?php echo (isset($_GET['withDeleted'])) ? "checked" : ""; ?> name="withDeleted" type="checkbox">
</form>
<form name="onlyDeleted" action="/" method="GET">
    <label for="onlyDeleted">Только удаленные</label>
    <input id="toggle-two" <?php echo (isset($_GET['withDeleted'])) ? "checked" : ""; ?> name="onlyDeleted" type="checkbox">
</form>
<div class="input-group rounded">
    <input name="search" type="search" class="form-control rounded" placeholder="Поиск по товарам" aria-label="Search" aria-describedby="search-addon" />
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">ID категории</th>
        <th scope="col">Заголовок
            <div>
                <a class="title-asc" href="">по возрастанию</a> <br>
                <a class="title-desc" href="">по убыванию</a>
            </div>
        </th>
        <th scope="col">Цена
        <div>
            <a class="price-asc" href="">по возрастанию</a> <br>
            <a class="price-desc" href="">по убыванию</a>
        </div>
        </th>
        <th scope="col">Описание</th>
        <th scope="col">Сортировка</th>
        <th scope="col">Создано
            <div>
                <a class="create-asc" href="">по возрастанию</a> <br>
                <a class="create-desc" href="">по убыванию</a>
            </div>
        </th>
        <th scope="col">Обновлено
            <div>
                <a class="update-asc" href="">по возрастанию</a> <br>
                <a class="update-desc" href="">по убыванию</a>
            </div>
        </th>
        <th scope="col">Удалено
            <div>
                <a class="delete-asc" href="">по возрастанию</a> <br>
                <a class="delete-desc" href="">по убыванию</a>
            </div>
        </th>
        <th scope="col">Обновить</th>
        <th scope="col">Удалить</th>
    </tr>
    </thead>
    <tbody class="products-list">

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