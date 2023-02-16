<?php
require_once('connect.php');
global $yhendus;


if (isset($_POST['submit'])) {
$Nimi = $_POST['Nimi'];
$suusalis = $_POST['suusalis'];

// connect to database
$conn = mysqli_connect("d113362.mysql.zonevs.eu", "d113362_vlademir", "zoneidpassword", "d113362_baas");

// check if the previous record in the "suusahyppajad" table has a non-empty and non-0 value in the "valmis" field
$sql = "SELECT * FROM suusahyppajad ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['valmis'] != 0 && $row['valmis'] != "") {
// insert data into the "suusahyppajad" table
$sql = "INSERT INTO suusahyppajad (Nimi, alustanud) VALUES ('$Nimi', '$suusalis')";
mysqli_query($conn, $sql);
echo "Andmete sisestamine õnnestus.";
} else {
echo "Andmeid ei saa sisestada väljadele Nimi ja staatus enne viimase osaleja finišit.";
}

mysqli_close($conn);
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
    <h2>Suusahüppajate Lisamine</h2>
    <div class="navbar" id="myNavbar">
        <a href="Suusahüppajate_Lisamiseks.php">Kasutaja Suusahüppajate Lisamine</a>
        <a href="KaugusLopp.php">tulemuste sisestamine</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
</header>
<table>
    <tr>
        <th>Nimi</th>
        <th>Alustanud</th>
        <th>Kaugus</th>
        <th>Valmis</th>
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
        echo "<td>".$valmis."</td>";
        echo "</tr>";
    }
    ?>
</table>
<div>
    <h2>Loo uus suusahüppaja</h2>
    <form method="post">
<input type="text" placeholder="Sissesta Nimi" name="Nimi">
<input type="number" placeholder="Alustanud=1 mitte=0" name="suusalis">
<input type="submit" name="submit">
</form>
</div>
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