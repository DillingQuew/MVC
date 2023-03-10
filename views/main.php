<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Имя</th>
        <th scope="col">Фамилия</th>
        <th scope="col">Должность</th>
        <th scope="col">Подробнее</th>
        <th scope="col">Отчет НДФЛ</th>
        <th scope="col">Уволить сотрудника</th>
    </tr>
    </thead>
    <tr class="container col-md" style="display:flex; ">
        <h1>Сотрудники</h1>
        <a class = "btn btn-primary" href="main/addPerson">Добавить сотрудника</a>
    </tr>
    <?php while($obj = $data->fetch(PDO::FETCH_LAZY))
    {
        ?>
        <tr>

            <td><?php echo $obj['Id']?></td>
            <td><?php echo $obj['FirstName']?></td>
            <td><?php echo $obj['LastName']?></td>
            <td><?php echo $obj['Job']?></td>
            <td>
                <form action="main/person" method="GET">
                    <input type="hidden" id="Id" name="Id" value="<?php echo($obj['Id']);?>">
                    <button type="submit" class="btn btn-primary">Подробнее</button>
                </form>
            </td>
            <td>
                <form action="main/NDFL" method="GET">
                    <input type="hidden" id="Id" name="Id" value="<?php echo($obj['Id']);?>">
                    <div class="form-group" >
                        <label for="year">Выберите год</label>
                        <select class="form-control" id="year" name="year">
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">ОТЧЕТ НДФЛ</button>

                </form>
            </td>
            <td>
                <form action="main/delete" method="POST">
                    <input type="hidden" id="Id" name="Id" value="<?php echo($obj['Id']);?>">
                    <button type="submit" class="btn btn-danger">Уволить сотрудника</button>
                </form>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>