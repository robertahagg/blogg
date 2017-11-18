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
    <link rel="stylesheet" type="text/css" href="adminpage.css">
</head>

<body>
    <main>
    <header>
        
        <h1> Welcome Admin!
        </h1>
        <nav>
            <ul>
            <a class="logout" href="/logout">Log out</a>
            </ul>
        </nav>
        <h2></h2>
        <div class="image"></div>
    </header>
        <section>
        <h2>Create new blog post</h2>
            <form class="post_form" action="/posts" method="post">
                    
                    <label for="title">Title:</label> 
                    <input class="single_line_box"type="text" id="" name="title">
                
                    <label for="msg">Body:</label> 
                    <textarea class="body_box"id="" name="user_message"></textarea>
            
                    <label for="media_url">Media url:</label> 
                    <input class="single_line_box"type="media" id="" name="media_url">


                    <form><label for="category">Categories:</label> 
  <input type="radio" name="category" value="1"> Travel
  <input type="radio" name="category" value="2"> Fashion
  <input type="radio" name="category" value="4"> Inspiration
  <input type="radio" name="category" value="3"> General
</form> 
                
                    <label for="category">Tags:</label> 
                    <form action="/action_page.php" method="get">
  <input type="checkbox" name="category" value="Example"> Example
  <input type="checkbox" name="category" value="Example"> Example
  <input type="checkbox" name="category" value="Example"> Example
  <input type="checkbox" name="category" value="Example"> Example
                
                <div class="button">
                    <button type="submit">Publish</button>
                    <button type="submit">Save</button>
                    <button type="submit">Trash</button>
                </div>
            </action>
            </form>
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
    <a href="#" class="previous_button">&laquo; Previous</a>
    <a href="#" class="next_button">Next &raquo;</a>
</footer>

</html>



