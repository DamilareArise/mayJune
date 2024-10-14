<?php 

session_start();
include 'database.php';

$errors = [
    'email' => '',
    'password' => '',
    'account' => ''
];

$email = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
 
    
    if (empty($email)) {
        $errors['email'] = 'email is required';
    } else if (empty($password)) {
        $errors['password'] = 'password is required';
    } else {

        // echo "successfull ->  $email, $password";

        $sql ="SELECT * FROM user_table WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $hash_password =  $row['password'];
            $id = $row['id'];
            if (password_verify($password, $hash_password)) {
                $_SESSION['id'] = $id;

                // set cookie
                setcookie('email', $row['email'], time() + 3600, '/');

                header('location: allPost.php');
                exit;
            }
            else{
                $errors['account'] = 'wrong email or password';
            }
            
        }else{
            $errors['account'] = 'wrong email or password';

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
            <h1 class="text-center">Sign in</h1>
            <?php if($errors['account']){?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($errors['account']) ?>
                </div>
            <?php }?>
            <input type="email" placeholder="Email" name="email" class="form-control mb-2" value="<?php echo $email ?>">
            <small class="text-danger mb-2"><?php echo htmlspecialchars($errors['email']) ?></small>

            <input type="password" placeholder="Password" name="password" class="form-control mb-2" value="<?php echo $password ?>">
            <small class="text-danger mb-2"><?php echo htmlspecialchars($errors['password']) ?></small>

            <button class="btn btn-primary w-100" type="summit"> Sign in bro!</button>
        </form>
    </div>

    <?php include 'footer.php' ?>

</body>

</html>