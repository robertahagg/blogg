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
        <form>
            <input type="search" name="q" placeholder="Find posts">
            <input type="submit" value="Search">
        </form>
        <nav>
            <ul>
                <i class="fa fa-user" aria-hidden="true"><p>Log out</p></i>
            </ul>
        </nav>
        <h1> Welcome Lynn Dylan!
            <p>&hearts;</p>
        </h1>
        <h2></h2>
        <div class="image"></div>
    </header>
        <section>
        <h2>Create a new post</h2>
        <form class="post_form"></form>
        <action="" method="post">
            <div>
                <div>
                    <label for="id">#Id:</label> <input type="id" id="id" name="id">
                </div>
                <div>
                    <label for="date">Date:</label> <input type="date" id="" name="date">
                </div>
                <div>
                    <label for="author">Author:</label> <input type="author" id="author" name="author">
                </div>
                <label for="title">Title:</label> <input type="text" id="" name="title">
            </div>
            <div>
                <label for="msg">Body:</label> <textarea id="" name="user_message"></textarea>
            </div>
            <div>
                <label for="media_url">Media url:</label> <input type="media" id="" name="media_url">
            </div>
            <div>
                <label for="category">Category:</label> <input type="category" id="category" name="category">
            </div>
            <div>
                <label for="tags">Tags:</label> <input type="tags" id="tags" name="tags">
            </div>
            <div class="button">
                <button type="submit">Submit your post</button>
            </div>
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
                <th>Category</th>
                <th>Tags</th>
                <th>Status</th>
            </tr>
            <?php 
             $posts = $params[posts];
            foreach($posts as $i => $post):
        ?>
            <tr>
                <td><?php echo $post->getId(); ?></td>
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



