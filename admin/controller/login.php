<?php
require('/xampp/htdocs/CSE485_1851061727_LeAnhDuy/config.php');
session_start();
if (isset($_POST['login'])) 
{
    $email = $_POST['email'];
    if (empty($email)) {
        $errors[] = 'You forgot to enter your email address!';
    }
    $password = $_POST['pass'];
    if (empty($password)) {
        $errors[] = 'You forgot to enter your password!';
    }
    if (empty($errors)) {
        $sql = "SELECT email,password FROM about_me WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        if (mysqli_num_rows($result) == 1) {
            if (password_verify($password, $row[1])) {
                $_SESSION['email'] = $row[0];
                header('Location: ../index.php');
            }
            else {
                $errors[] = 'E-mail / Password is incorrect! ';
                  }
            }
            else {
                $errors[] = 'E-mail / Password is incorrect! ';
            }
        } else {
            $errors[] = 'E-mail / Password is incorrect!';
        }
        if (!empty($errors)) {
            $errorstring = 'Error! \n';
            foreach ($errors as $msg) {
                $errorstring = $errorstring .$msg.'\n';
            }
            $errorstring .= 'Try again';
            echo "<script>alert('$errorstring')</script>";
        }
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="box" action="login.php" method="POST">
                    <h1>Login</h1>
                     <input type="text" name="email" placeholder="Email" > <input type="password" name="pass" placeholder="Password"> <a class="forgot text-muted" href="#">Forgot password?</a> <input type="submit" name="login" value="Login" href="#">
                </form>
            </div>
        </div>
    </div>
</div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="../js/script.js"></script>
</body>
</html>