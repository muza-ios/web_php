<?php
require_once '../db.php';

if (!empty($_POST)) {
    $nomi = $baza->real_escape_string($_POST['nomi']);
    $narxi = intval($_POST['narxi']);
    $miqdori = intval($_POST['miqdori']);
    $kategoriya = intval($_POST['kategoriya']);
    $result = $baza->query("insert into tovar (nomi, narxi, miqdori, kategoriya_id) values ('$nomi', $narxi, $miqdori, $kategoriya)");
    if ($result == true) {
        echo "Saqlandi";
        header('Refresh: 2; URL=/final/tovar/list.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <table>
            <tr>
                <td width=100>Nomi</td>
                <td width=400><input type="text" name="nomi" value=""></td>
            </tr>
            <tr>
                <td width=100>Narxi</td>
                <td width=400><input type="text" name="narxi" value=""></td>
            </tr>
            <tr>
                <td width=100>Miqdori</td>
                <td width=400><input type="text" name="miqdori" value=""></td>
            </tr>
            <tr>
                <td width=100>Kategoriya</td>
                <td width=400>
                    <select name="kategoriya">
                        <?php
                        $result = $baza->query("select * from kategoriya");
                        while ($obj = $result->fetch_assoc()) {
                            echo "<option value={$obj['id']}>{$obj['nomi']}</option>";
                        }
                        ?>
                    </select>

                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Saqlash"></td>
            </tr>
        </table>

    </form>
</body>

</html>