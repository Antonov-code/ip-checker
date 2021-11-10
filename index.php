<?php
session_start();

include_once "functions.php";

$ip = $_SERVER["REMOTE_ADDR"];
$user_agent = $_SERVER['HTTP_USER_AGENT'];

$ip_data = get_data_by_ip($ip);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check my IP</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/dark_theme.css">

    <link rel="shortcut icon" href="img/icon-ip.png" type="image/x-icon">
</head>
<body>
    <div class="wrapper">
        <main class="main">
            <div class="left_column">
                <h1 class="ip">IP : <?=$ip?></h1>

                <?php
                    if (isset($ip_data['status'])){
                        if ($ip_data['status'] == 'success'){
                            ?>
                                <span class="">Провайдер: <?=$ip_data['as']?></span></br>
                                <span class="location">Страна: <?=$ip_data['country']?></span></br>
                                <span class="location">Регион: <?=$ip_data['regionName']?></span></br>
                                <span class="location">Город: <?=$ip_data['city']?></span></br>
                            <?php
                        } elseif (($ip_data['status'] == 'fail')){
                            echo $ip_data['message'];
                        }
                    }
                ?>
                <span class="ua">User Agent: <?=$user_agent?></span></br>
                <span class="js" id="js">JavaScript: OFF</span></br>
            </div>
            <div class="right_column">
                <img src="img/connect.jpg" alt="" class="main_img">
            </div>
        </main>
    </div>
    <script>
        document.getElementById("js").innerHTML = 'JavaScript: ON';
    </script>
    <script src="js/script.js"></script>
</body>
</html>