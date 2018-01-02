<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abel|Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:200" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Lynn Dylan</title>
    <link rel="stylesheet" type="text/css" href="/adminpage.css">
</head>

<body>
    <main>
    <header>
        
        <h1> Welcome Admin!
        </h1>
        <nav>
            <ul>
            <a class="logout" href="logout">Log out</a>
            </ul>
        </nav>
        <h2></h2>
        <div class="image"></div>
    </header>
        <section>
        <a href="newPost">Create a new post</a>
            
    </section>
    <section>
        <h2>Dashboard for your posts</h2>
        <table>
            <tr>
                <th>#id</th>
                <th>Title</th>
                <th>Date</th>
                <th>Author</th>
                <th>Categories</th>
                <th>Tags</th>
                <th>Status</th>
            </tr>
            <?php 
            $posts = $params[posts];
            foreach ($posts as $i => $post) :
            ?>
            <tr>
                <td><a href="admin/posts/1"><?php echo $post->getId(); ?></a></td>
                <td><?php echo $post->getTitle(); ?></td>
                <td><?php echo $post->getDate(); ?></td>
                <td><?php echo $post->getTitle(); ?></td>
            </tr>
            <?php endforeach; ?>

        </table>
    </section>

    </main>
</body>
<footer>
  
</footer>

</html>



