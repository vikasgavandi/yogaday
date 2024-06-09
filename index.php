<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Nunito', sans-serif;
    background-image: url("./assets/background.png");
    background-size: cover;
    background-position: center;
}

.logo {
    max-width: 75%;
    padding-top: 2rem;
}

.login-form {
    max-width: 400px;
    margin: 0 auto;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-control {
    border: 1px solid #A3238F;
    border-radius: 20px;
    margin-bottom: 20px;
}

.btn-primary {
    background-color: #A3238F;
    border: 1px solid #A3238F;
}

.btn-primary:hover {
    background-color: #790f8c;
    border-color: #790f8c;
}

    </style>

<body>
    <div class="container">
        <div class="text-center my-4">
            <img src="./assets/brandlogo.png" alt="Yoga Day Logo" class="logo">
        </div>
        <div class="login-form">
            <form action="login_handler.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Enter your username">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
