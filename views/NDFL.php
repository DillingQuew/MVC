<?php $count = 0;?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Месяц</th>
        <th scope="col">Имя</th>
        <th scope="col">Фамилия</th>
        <th scope="col">Должность</th>
        <th scope="col">Зарплата</th>
    </tr>
    </thead>
    <tr class="container col-md">
        <h1>Отчет НДФЛ за 2023г</h1>
    </tr>
<!--    --><?php //var_dump($data['list']); die;?>
    <?php foreach($data['list'] as $obj)
    {

        $timestamp = strtotime($obj['time']);
        $month = date('m', strtotime($obj['time']));

        ?>
        <tr>
            <td><?php echo ++$count?></td>
            <td><?php echo $month?></td>
            <td><?php echo $obj['FirstName']?></td>
            <td><?php echo $obj['LastName']?></td>
            <td><?php echo $obj['Job']?></td>
            <td><?php echo $obj['Salary']?> руб. </td>
<!--            <td>--><?php //echo $_SESSION['test'];?><!--</td>-->
        </tr>
        <?php

    }
    ?>

    </tbody>
</table>
<h3 style="text-align: right">Суммарный доход за год
    <?php foreach($data['sum'] as $obj)
    {
        echo $obj['person_sum'] . ' руб.';
    }
    ?>

</h3>