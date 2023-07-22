<div class="col-md-4 m-auto">
    <form action="/main/create" method="post">
        <input type="hidden" value="<?= $data['id'] ?>">
        <div class="form-group">
            <label for="category_id">ID категории</label>
            <input type="text" value="<?= $data['category_id'] ?>" name="category_id" class="form-control" placeholder="1">
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text"  value="<?= $data['title'] ?>"  name="title" class="form-control" placeholder="1">
        </div>
        <div class="form-group">
            <label for="price">Цена</label>
            <input type="text" value="<?= $data['price']?>" name="price" class="form-control" placeholder="100">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" rows="3" placeholder="Введите описание товара"><?= $data['description'] ?? "1" ?></textarea>
        </div>
        <div class="form-group">
            <label for="sort">Сортировка</label>
            <input type="text" name="sort" value="<?= $data['sort'] ?? "1" ?>" class="form-control" placeholder="1">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
    </form>
</div>