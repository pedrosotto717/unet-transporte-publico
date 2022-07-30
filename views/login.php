<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
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
                <button type="submit" class="form-btn btn">Login</button>
            </form>
        </div>
    </main>
</body>

</html>