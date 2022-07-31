<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    use app\utils\Views;

    Views::include("head", [
        "title" => "Login"
    ]); ?>
</head>

<body>
    <?php Views::include("header"); ?>
    <div>
        <?php
        if (isset($errors)) {
            foreach ($errors as $error) {
                echo $error;
            }
        }
        ?>
    </div>
    <main class="container">
        <div class="form-container">
            <h1 class="form-title">Login</h1>
            <form action="/auth" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="password">
                </div>
                <input type="submit" class="form-btn btn">
            </form>
        </div>
    </main>
</body>

</html>