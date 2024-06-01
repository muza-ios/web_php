<?php
require_once '../db.php';

if (!empty($_POST)) {
    $nomi = $baza->real_escape_string($_POST['nomi']);
    $result = $baza->query("insert into kategoriya (nomi) values ('$nomi')");
    if ($result == true) {
        echo "Saqlandi";
        header('Refresh: 2; URL=/final/kategoriya/list.php');
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
                <td></td>
                <td><input type="submit" value="Saqlash"></td>
            </tr>
        </table>

    </form>
</body>

</html>