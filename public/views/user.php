<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/b3ac0c358a.js" crossorigin="anonymous"></script>
    <title> MAIN PAGE </title>
</head>
<body>
<div class="base-container">
    <?php include("nav.php")?>
    <main>
        <section class="project-form">
            <h1>UPLOAD</h1>
            <form action="addProject" method="POST" ENCTYPE="multipart/form-data">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="title" type="text" placeholder="title">
                <textarea name="description" rows=5 placeholder="description"></textarea>

                <input type="file" name="file"/><br/>
                <button type="submit">send</button>
            </form>
        </section>
    </main>
</div>
</body>