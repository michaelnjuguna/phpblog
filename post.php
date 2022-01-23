<!-- connect to database -->
<?php include "partials/connect.php"?><?php

// to check if the id has been given
$title = $_GET["title"] ?? null;
//if id has not been given redirect the user to index.php
if (!$title) {
    header('Location:index.php ');
    exit;
}

//to get the products from the database
$statement = $pdo->prepare("SELECT * FROM blog WHERE title = :title");
//to bind the :id to real id in the database
$statement->bindValue(":title", $title);
//to execute the statement
$statement->execute();
//the product i will use
$posts = $statement->fetch(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($posts);
// echo "</pre>";


//echo $posts["title"];
//print_r(array_keys($posts));
?>



<!-- import the header -->
<?php include "partials/header.php"?>

<!-- title -->
<title>Post</title>
</head>
<body>

<!-- import the top part -->
<?php include "partials/top.php"?>

<!-- to show the entire post -->
<ul>
       
            <li>
                <h1 name="title"><?php echo $posts["title"] ?></h1>
                <p name="post"><?php echo $posts["post"] ?></p>
               
        </li>

    </ul>
</body>
</html>