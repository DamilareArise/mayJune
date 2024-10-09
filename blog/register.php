<?php
include 'database.php';

$errors = [
    'fullname' => '',
    'email' => '',
    'password' => '',
    'confirm_password' => ''

];

$fullname = '';
$email = '';
$password = '';
$confirm_password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    
    if (empty($fullname)) {
        $errors['fullname'] = 'fullname is required';
    } else if (empty($email)) {
        $errors['email'] = 'email is required';
    } else if (empty($password)) {
        $errors['password'] = 'password is required';
    } else if (empty($confirm_password)) {
        $errors['confirm_password'] = 'confirm password is required';
    } else if ($password !== $confirm_password) {
        $errors['confirm_password'] = 'Passwords did not match';
    } else {

        // echo "successfull -> $fullname, $email, $password";

        $sql ="SELECT * FROM user_table WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $errors['email'] = 'email already exist';
        } 
        else {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            // echo $hash_password;
            $sql = "INSERT INTO user_table (fullname, email, password) VALUES ('$fullname', '$email', '$hash_password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header('location: login.php');
                exit;
            }else{
                echo 'Error: '. mysqli_error($conn);
            }
        }

    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>

<body>
    <?php include 'navbar.php' ?>

    <div class="container col-9 col-md-5 p-4">

        <form action="" method="POST">
            <h1 class="text-center">Sign up</h1>

            <input type="text" placeholder="Fullname" name="fullname" class="form-control mb-2" value="<?php echo $fullname ?>">
            <small class="text-danger mb-2"><?php echo htmlspecialchars($errors['fullname']) ?></small>

            <input type="email" placeholder="Email" name="email" class="form-control mb-2" value="<?php echo $email ?>">
            <small class="text-danger mb-2"><?php echo htmlspecialchars($errors['email']) ?></small>

            <input type="password" placeholder="Password" name="password" class="form-control mb-2" value="<?php echo $password ?>">
            <small class="text-danger mb-2"><?php echo htmlspecialchars($errors['password']) ?></small>

            <input type="password" placeholder="Confirm Password" name="confirm_password" class="form-control mb-2" value="<?php echo $confirm_password ?>">
            <small class="text-danger mb-2"><?php echo htmlspecialchars($errors['confirm_password']) ?></small>
            <button class="btn btn-primary w-100" type="summit"> Sign up bro!</button>
        </form>
    </div>

    <?php include 'footer.php' ?>

</body>

</html>