<?php

include 'database.php';


$error = [
    "title" => '',
    "author" => '',
    "post" => ''
];

$title = '';
$author = '';
$post = '';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $post = mysqli_real_escape_string($conn, $_POST['post']);
    


    // echo $title . '<br>' . $author . '<br>' . $post;

    if (empty($title)) {
        $error['title'] = 'Please enter a title';
    } else if (!$author) {
        $error['author'] = 'Please enter an author';
    } else if (!isset($post)) {
        $error['post'] = 'Please enter a post';
    } else {
        // echo 'successfully posted';
        echo $title . '<br>' . $author . '<br>' . $post;

        // CREATE a post into the database
        $sql = "INSERT INTO post_table(title, author, post) VALUES('$title', '$author', '$post')";
        $query = mysqli_query($conn, $sql);
        if ($query){
            header('location: allPost.php');
            exit;
        }else{
            echo 'Error: '. mysqli_error($conn);
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php include 'navbar.php' ?>

    <div class="my-5 container col-8 col-md-5">
        <form action="index.php" method="POST">
            <h3 class="text-center">Make a post</h3>
            <input type="text" class="form-control mb-2" placeholder="Title" name="title" value="<?php echo $title ?>" >
            <small class="mb-2 d-block text-danger"><?php echo htmlspecialchars($error['title']) ?> </small>

            <input type="text" class="form-control mb-2" placeholder="Author" name="author" value="<?php echo $author ?>">
            <small class="mb-2 d-block text-danger"><?php echo htmlspecialchars($error['author']) ?> </small>

            <textarea class="form-control mb-2" placeholder="Post" name="post"><?php echo $post ?></textarea>
            <small class="mb-2 d-block text-danger"><?php echo htmlspecialchars($error['post']) ?> </small>

            <button class="btn btn-primary w-100">Post</button>
        </form>

    </div>

    <?php include 'footer.php' ?>


</body>
</html>

