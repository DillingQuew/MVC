<form action="/main/create" method="POST">
    <div class="form-group">
        <label for="exampleFormControlInput1">Имя</label>
        <input type="text" class="form-control" id="FirstName" name="FirstName" value="" placeholder="Имя">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Фамилия</label>
        <input type="text" class="form-control" id="LastName" name="LastName"value="" placeholder="Фамилия">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Должность</label>
        <input type="text" class="form-control" id="Job" name="Job" value="" placeholder="Должность">
    </div>
    <label for="exampleFormControlInput1">Зарплата</label>
    <input type="text" class="form-control" id="Salary" name="Salary" value="" placeholder="Зарплата">
    </div>

    <div style="display:none">
        <div class="form-group" >
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="form-group" >
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Example multiple select</label>
            <select multiple class="form-control" id="exampleFormControlSelect2">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </div>

    <button type="submit" class="btn btn-success">Сохранить</button>
</form>