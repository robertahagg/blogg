<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abel|Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:200" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Lynn Dylan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>

    </header>
    <form>
        <input type="search" name="q" placeholder="Find posts">
        <input type="submit" value="Search">
    </form>
    <nav>
        <ul>
            <i class="fa fa-user" aria-hidden="true"></i>
            <li><a href="#contact">|Contact| </a>
                <li><a href="#about"> About|</a>
        </ul>
    </nav>
    <main role="main">
        <div class="image"></div>
        <section>


        <?php 
             $posts = $params[posts];
            foreach($posts as $i => $post):
        ?>

             <article>
                <h1><?php echo $post->getTitle(); ?></h1>
                <h2><?php echo $post->getDate(); ?></h2>
                <p><?php echo $post->getBody(); ?></p>

                <?php if (!empty($post->getImageUrl())) {
                    $url = $post->getImageUrl();
                    echo "<img src='$url' width='800' height='500'>"; }
                ?>

            </article>
            <aside>
                <i class="fa fa-facepost" aria-hidden="true"></i>
                <i class="fa fa-instagram" aria-hidden="true"></i>
                <i class="fa fa-snapchat-ghost" aria-hidden="true"></i>
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </aside>
        <?php endforeach; ?>

        </section>
    </main>
</body>
<footer>
    <a href="#" class="previous_button">&laquo; Previous</a>
    <a href="#" class="next_button">Next &raquo;</a>
</footer>

</html>



