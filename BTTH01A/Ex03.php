<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex03</title>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Tên khóa học</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $arrs = ['PHP', 'HTML', 'CSS', 'JS'];
            foreach ($arrs as $i) {
            ?>
                <tr>
                    <td ><?= $arrs[$i] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>