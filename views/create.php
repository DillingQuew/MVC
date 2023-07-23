<div class="col-md-4 m-auto">
    <form action="/main/create" method="post">
        <div class="form-group">
            <label for="category_id">ID категории</label>
            <input type="number" name="category_id" class="form-control" placeholder="1" min="1" max="128" required>
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" name="title" class="form-control" placeholder="Заголовок" required>
        </div>
        <div class="form-group">
            <label for="price">Цена</label>
            <input type="text" name="price" class="form-control" placeholder="100" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" rows="3" placeholder="Введите описание товара"></textarea>
        </div>
        <div class="form-group">
            <label for="sort">Сортировка</label>
            <input type="number" name="sort" class="form-control" min="0" max="128" placeholder="1" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
    </form>
</div>