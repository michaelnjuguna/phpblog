<!-- to connect to mysql database -->
<?php include "partials/connect.php"?>
<?php
//to get all posts and order them by date descending order
$statement=$pdo->prepare("SELECT * FROM blog ORDER BY create_date DESC");
$statement->execute();
// assigns the items posts to the posts array
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);




?>

<!--header partials-->
<?php include "partials/header.php"?>

<!--title-->
<title>Php Blog</title>

</head> 


<body>
 
<!--header-->
<?php include "partials/top.php"?>
<!--blog content-->
    <ul>
        <!-- to dynamically show the blog posts -->
        <?php forEach($posts as $i => $posts){?>
            <li>
                <h1 name="title"><?php echo $posts["title"]?></h1>
                <p name="post"><?php echo $posts["post"]?></p>
                <button><a href="post.php?title=<?php echo $posts["title"]?>">Read More</a></button>
               
        </li>
        <?php }?>
    </ul>

</body>


</html>