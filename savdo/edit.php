<?php
require_once '../db.php';
$id = $_GET['id'];
$result = $baza->query("select * from tovar where id=$id");
$tovar = $result->fetch_assoc();

if (!empty($_POST)) {
    $nomi = $baza->real_escape_string($_POST['nomi']);
    $narxi = intval($_POST['narxi']);
    $miqdori = intval($_POST['miqdori']);
    $kategoriya = intval($_POST['kategoriya']);
    $result = $baza->query("update tovar set nomi='$nomi', narxi=$narxi, miqdori=$miqdori, kategoriya_id=$kategoriya where id=$id");
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
                <td width=400><input type="text" name="nomi" value="<?= $tovar['nomi'] ?>"></td>
            </tr>
            <tr>
                <td width=100>Narxi</td>
                <td width=400><input type="text" name="narxi" value="<?= $tovar['narxi'] ?>"></td>
            </tr>
            <tr>
                <td width=100>Miqdori</td>
                <td width=400><input type="text" name="miqdori" value="<?= $tovar['miqdori'] ?>"></td>
            </tr>
            <tr>
                <td width=100>Kategoriya</td>
                <td width=400>
                    <select name="kategoriya">
                        <?php
                        $result = $baza->query("select * from kategoriya");
                        while ($kategoriya = $result->fetch_assoc()) {
                            if ($kategoriya['id'] == $tovar['kategoriya_id'])
                                echo "<option value={$kategoriya['id']} selected>{$kategoriya['nomi']}</option>";
                            else
                                echo "<option value={$kategoriya['id']}>{$kategoriya['nomi']}</option>";
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