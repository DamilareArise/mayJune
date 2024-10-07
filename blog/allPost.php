<?php 
   include 'database.php';


   $sql = 'SELECT * FROM post_table';
   $result = mysqli_query($conn, $sql);
   $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
//    print_r($posts);  
    

    if (isset( $_GET['id'])){
        $id = $_GET['id'];
        echo $id;

        $sql = "DELETE FROM post_table WHERE post_id = $id";
        $result = mysqli_query($conn, $sql);
        if ($result){
            header('location: allPost.php');
            exit;
        }else{
            echo 'Error: '. mysqli_error($conn);
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


                        <!-- Edit modal trigger -->
                        <button  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalEdit_<?php echo $post['post_id'] ?>">Edit</button>


                        <!--Edit  Modal -->

                        <div class="modal fade" id="exampleModalEdit_<?php echo $post['post_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form action="index.php" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                                    <input type="text" class="form-control mb-2" placeholder="Title" name="title" value="<?php echo $post['title'] ?>" >
                                    
                                    <input type="text" class="form-control mb-2" placeholder="Author" name="author" value="<?php echo $post['author'] ?>">
                                   

                                    <textarea class="form-control mb-2" placeholder="Post" name="post"><?php echo $post['post'] ?></textarea>
                                    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                        </form>
                        </div>






                        <!-- Delete Modal triger -->
                        <button  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $post['post_id'] ?>">Delete</button>

                        <!--Delete  Modal -->
                        <div class="modal fade" id="exampleModal_<?php echo $post['post_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete <?php echo $post['title'] ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <a href="allPost.php?id=<?php echo $post['post_id'] ?>" type="button" class="btn btn-primary">Yes</a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>



    <?php include 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>