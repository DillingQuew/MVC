<?php $count = 0?>
<div class="container" style="margin: 50px;">
    <div class="row">
        <div class="col-4">
            <?php foreach($data['person'] as $obj)
            {
            ?>
            <form action="/main/paySalary" method="POST">
                <input type="hidden" class="form-control" id="Id" name="Id" value="<?php echo($obj['Id'])?>" placeholder="name@example.com">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Имя</label>
                    <input type="text" class="form-control" id="FirstName" name="FirstName" value="<?php echo($obj['FirstName'])?>" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Фамилия</label>
                    <input type="text" class="form-control" id="LastName" name="LastName"value="<?php echo($obj['LastName'])?>" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Должность</label>
                    <input type="text" class="form-control" id="Job" name="Job" value="<?php echo($obj['Job'])?>" placeholder="name@example.com">
                </div>
                <label for="exampleFormControlInput1">Зарплата</label>
                <input type="text" class="form-control" id="Salary" name="Salary" value="<?php echo($obj['Salary'])?>" placeholder="name@example.com">


        <button type="submit" class="btn btn-success" style="display: block; margin: 20px 0;">Зачислить зарплату</button>
        </form>
        <?php
        }
        ?>
        </div>
        <div class="col-8">
            <h2 class="" style="font-size: 36px">!Внимание!</h2>
            <p>Нажимайте на кнопку "Зачислить зарплату" только в начале месяца и один раз!!!. </p>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Год-Месяц</th>
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Должность</th>
            <th scope="col">Оклад</th>
        </tr>
        </thead>
        <tr class="container col-md">
            <h1 style="">История карьеры сотрудника</h1>
        </tr>

        <?php foreach($data['list'] as $obj)
        {
            $timestamp = strtotime($obj['time']);
            $month = date('Y-m', strtotime($obj['time']));
            ?>
            <tr>
                <td><?php echo ++$count?></td>
                <td><?php echo $month?></td>
                <td><?php echo $obj['FirstName']?></td>
                <td><?php echo $obj['LastName']?></td>
                <td><?php echo $obj['Job']?></td>
                <td><?php echo $obj['Salary']?> руб.</td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
