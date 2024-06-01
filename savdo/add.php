<?php
require_once '../db.php';

if (!empty($_POST)) {
    $error = 0;
    $miqdor = intval($_POST['miqdor']);
    $tovar_id = intval($_POST['tovar']);
    $sana = $_POST['sana'];
    //xatolarni tekshirish qismi
    $result = $baza->query("select miqdori, narxi from tovar where id=$tovar_id");
    $tanlangan_tovar = $result->fetch_assoc();
    if ($tanlangan_tovar['miqdori'] < $miqdor) {
        //xato
        echo "Miqdor tovar miqdoridan katta";
        $error = 1;
    }
    // umumiy miqdorni avtomatik hisoblash
    $umumiy_narx = $miqdor * $tanlangan_tovar['narxi'];

    if ($error == 0) {
        $result = $baza->query("insert into savdo (tovar_id, sana, miqdor, umumiy_narx) values ($tovar_id, '$sana', $miqdor, $umumiy_narx)");
        if ($result == true) {
            echo "Saqlandi";
            header('Refresh: 2; URL=/final/savdo/list.php');
        }
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
                <td width=100>Sana</td>
                <td width=400><input type="date" name="sana" value="<?= $sana ?>"></td>
            </tr>
            <tr>
                <td width=100>Miqdor</td>
                <td width=400><input type="number" name="miqdor" value="<?= $miqdor ?>"></td>
            </tr>
            <!-- <tr>
                <td width=100>Umumiy narx</td>
                <td width=400><input type="number" name="narx" value="<?= $umumiy_narx ?>"></td>
            </tr> -->
            <tr>
                <td width=100>Tovar</td>
                <td width=400>
                    <select name="tovar">
                        <?php
                        $result = $baza->query("select * from tovar");
                        while ($tovar = $result->fetch_assoc()) {
                            if ($tovar_id == $tovar['id'])
                                echo "<option value={$tovar['id']} selected>{$tovar['nomi']}</option>";
                            else
                                echo "<option value={$tovar['id']}>{$tovar['nomi']}</option>";
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