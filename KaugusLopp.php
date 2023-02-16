<?php
require_once('connect.php');
global $yhendus;

if(isset($_REQUEST['karas'])) {
    if(!empty($_REQUEST['Kauguslis'])) {
        $kauguslis = $_REQUEST['Kauguslis'];
        if ($kauguslis >= 0) {
            $kask = $yhendus->prepare("UPDATE suusahyppajad SET kaugus = ? WHERE id = ?");
            $kask->bind_param("si", $kauguslis, $_REQUEST['karas']);
            $kask->execute();
        } else {
            echo "Please enter a positive value for Kauguslis";
        }
    }
    header("Location: $_SERVER[PHP_SELF]");
}

if(isset($_REQUEST['karasik'])) {
    if(!empty($_REQUEST['Valmislis'])) {
        $valmislis = $_REQUEST['Valmislis'];
        if ($valmislis >= 0) {
            $kask = $yhendus->prepare("UPDATE suusahyppajad SET valmis = ? WHERE id = ?");
            $kask->bind_param("si", $valmislis, $_REQUEST['karasik']);
            $kask->execute();
        } else {
            echo "Please enter a positive value for Valmislis";
        }
    }
    header("Location: $_SERVER[PHP_SELF]");
    
}






?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Suusahüppevõistlus</title>
    <script>//добавление навигационого меню
        function myFunction() {
            var x = document.getElementById("myNavbar");
            if (x.className === "navbar") {
                x.className += " responsive";
            } else {
                x.className = "navbar";
            }
        }
    </script>
</head>
<body>
<header>
    <h1>Suusahüppevõistlus</h1>
    <h2>Suusahüppajate Lisamiseks</h2>
    <div class="navbar" id="myNavbar">
        <a href="Suusahüppajate_Lisamiseks.php">Kasutaja leht</a>
        <a href="KaugusLopp.php">tulemuste sisestamine</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
</header>
<table>
    <tr>
        <th>Nimi</th>
        <th>Alustanud</th>
        <th>Kaugus</th>
        <th>Lisa Kaugus</th>
        <th>Valmis</th>
        <th>Lisa Status</th>
    </tr>
    <?php
    /**tabeli sisu näitamine*/
    $kask = $yhendus->prepare('SELECT id,Nimi, alustanud, kaugus, valmis FROM suusahyppajad ORDER BY kaugus ASC');
    $kask->bind_result($id,$Nimi, $alustanud, $kaugus, $valmis);
    $kask->execute();
    while ($kask->fetch()){
        echo "<tr>";
        echo "<td>".$Nimi."</td>";
        echo "<td>".$alustanud."</td>";
        echo "<td>".$kaugus."</td>";
        echo "<td>
<form action = '?'>
<input type='hidden' value='$id' name='karas'>
<input type='text' name='Kauguslis'>
<input type='submit' value='OK'>
</form></td>";
        echo "<td>".$valmis."</td>";
        echo "<td>
<form action = '?'>
<input type='hidden' value='$id' name='karasik'>
<input type='text' placeholder='Valmis=1 mitte=0' name='Valmislis'>
<input type='submit' value='OK'>
</form></td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
<style>
    table, tr, td, th {
        text-align: center;
        border: 2pt solid black;
        overflow-x: auto;
    }
    th {
        background-color: lightgreen;
    }

    img {
        width: 150px;
        height: 150px;
    }
    .navbar {
        background-color: #333;
        overflow: hidden;
        position: head;
        bottom: 0;
        width: 100%;
    }

    /* Style the links inside the navigation bar */
    .navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    /* Change the color of links on hover */
    .navbar a:hover {
        background-color: #4CAF50;
        color: black;
    }

    /* Add a green background color to the active link */
    .navbar a.active {
        background-color: #ddd;
        color: white;
    }

    /* Hide the link that should open and close the navbar on small screens */
    .navbar .icon {
        display: none;
    }

    @media screen and (max-width: 600px) {
        .navbar a:not(:first-child) {display: none;}
        .navbar a.icon {
            float: right;
            display: block;
        }
    }

    /* The "responsive" class is added to the navbar with JavaScript when the user clicks on the icon. This class makes the navbar look good on small screens (display the links vertically instead of horizontally) */
    @media screen and (max-width: 600px) {
        .navbar.responsive a.icon {
            position: absolute;
            right: 0;
            bottom: 0;
        }
        .navbar.responsive a {
            float: none;
            display: block;
            text-align: left;
        }
    }
</style>