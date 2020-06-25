<?php
include "employee\Employee.php";
include "employee\EmployeeManager.php";
$employeeManager = new EmployeeManager("data.json");
$employees = $employeeManager->getAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="view.php">chi tiết</a>
<table>
    <tr>
        <th>Họ</th>
        <th>Tên</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>Vị trí</th>
    </tr>
    <?php foreach ($employees as $key =>$employee):?>
        <tr>
            <td><?php echo $employee->getLastName() ?></td>
            <td><?php echo $employee->getName() ?></td>
            <td><?php echo $employee->getBirth() ?></td>
            <td><?php echo $employee->getAddress() ?></td>
            <td><?php echo $employee->getPosition() ?></td>
        </tr>

    <?php endforeach;?>
</table>
</body>
</html>
