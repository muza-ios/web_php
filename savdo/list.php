<?php
require_once '../db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/final/style/stil.css">
</head>

<body>

    <h1>Savdo ma'lumotlari ro'yxati</h1>
    <h3><a href="/final/savdo/add.php"> Yangi savdo ma'lumotlarini qo'shish</a></h3>
    <table>
        <tr>
            <td>Tovar</td>
            <td>Sana</td>
            <td>Miqdor</td>
            <td>Umumiy narx</td>
            <td></td>
        </tr>
        <?php
        $query = 'select savdo.*, tovar.nomi as tnomi from tovar, savdo where savdo.tovar_id=tovar.id ';
        $result = $baza->query($query);
        while ($obj = $result->fetch_assoc()) {
            echo "
            <tr>
            <td>{$obj['tnomi']}</td>
            <td>{$obj['sana']}</td>
            <td>{$obj['miqdor']}</td>
            <td>{$obj['umumiy_narx']}</td>
            <td><a href='/final/savdo/edit.php?id={$obj['id']}'>O'zgartirish</a></td>
        </tr>
            ";
        }
        ?>
    </table>

</body>

</html>