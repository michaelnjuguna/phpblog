<!-- connect to MySQL database -->
<?php include "partials/connect.php"?>

<!-- to add input to the form  -->
<?php
// to declare variables before they are used
$title = "";
$post = "";

//an array to check if there are errors
$errors = [];
//to check the request method
if($_SERVER["REQUEST_METHOD"] === "POST"){
// to assign the variables to their respective values
$title = $_POST["title"];
$post = $_POST["post"];
//to check the inputs are not empty
if(!$title and !$post ){
  $errors[] = "Null values entered";
  
}
//to check if errors is empty to continue the program
if(!$errors){
  //to insert the items into the database
  $statement = $pdo->prepare("INSERT INTO blog(title,post)
  VALUES(:title,:post)");
  
  //binds the values to the variables
  $statement->bindValue(":title",$title);
  $statement->bindValue(":post",$post);
  //to execute the statements
  $statement->execute();


//to return to index page
  header("Location:index.php");
}


}


?>

<?php include "partials/header.php"?>
<!--title-->
<title>Admin page</title>


    </head>
    <body>
      <!--header-->
      <?php include "partials/top.php"?>  
     
 <!-- add post -->
 <form class="post-form"   method="post">
<input class="form-input" type="text" placeholder="Topic" name="title">
<textarea placeholder="Post" name="post"></textarea>
<button type="submit">Post</button>
 </form>
 <!-- to show when errors occur -->
<?php if (!empty($errors)) :?>
<script>alert("fill in all blanks")</script>
<?php endif; ?>

    </body>

</html>