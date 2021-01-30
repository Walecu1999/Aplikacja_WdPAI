<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/b3ac0c358a.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/profiles.js" defer></script>
    <title> MAIN PAGE </title>
</head>
<body>
<div class="base-container">
    <?php include ("nav.php")?>
    <main>
        <section class="profiles">
            <?php

                if(isset($profiles)){
                    foreach ($profiles as $profile){
                        include("profile.php");
                    }
                }
            ?>

        </section>
    </main>
</div>
</body>