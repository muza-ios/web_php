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

    <h1>Tovarlar ro'yxati</h1>
    <h3><a href="/final/tovar/add.php"> Yangi tovar qo'shish</a></h3>
    <table>
        <tr>
            <td>Nomi</td>
            <td>Narxi</td>
            <td>Miqdori</td>
            <td>Kategoriya</td>
            <td></td>
        </tr>
        <?php
        $query = 'select tovar.*, kategoriya.nomi as knomi from tovar, kategoriya where tovar.kategoriya_id=kategoriya.id ';
        $result = $baza->query($query);
        while ($obj = $result->fetch_assoc()) {
            echo "
            <tr>
            <td>{$obj['nomi']}</td>
            <td>{$obj['narxi']}</td>
            <td>{$obj['miqdori']}</td>
            <td>{$obj['knomi']}</td>
            <td><a href='/final/tovar/edit.php?id={$obj['id']}'>O'zgartirish</a></td>
        </tr>
            ";
        }
        ?>
    </table>

</body>

</html>