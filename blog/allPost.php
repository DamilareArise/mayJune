<?php 
   include 'database.php';


   $sql = 'SELECT * FROM post_table';
   $result = mysqli_query($conn, $sql);
   $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
//    print_r($posts);  

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

    <h1>All Post</h1>
    <div class="container bg-light py-5">
        <div class="row  gap-2 ">
            <?php foreach ($posts as $post) { ?>
                <div class="col-md-4 shadow-sm border border-primary py-3">
                    <h3 ><?php echo $post['title'] ?> </h3>
                    <p><?php echo $post['post'] ?> </p>
                    <b class="d-block "><?php echo $post['author'] ?></b>
                    <small class="d-block"><?php echo $post['date_created'] ?></small>
                    <div class="mt-2">
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>




    <?php include 'footer.php' ?>
</body>
</html>