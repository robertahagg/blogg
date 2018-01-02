<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abel|Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:200" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Blog Lynn Dylan</title>
    <link rel="stylesheet" type="text/css" href="/style.css">
</head>

<body>
<header>

<form class="login" method="post">
<input type="text" name="username" placeholder="Admin username"><br>
<input type="pasword" name="password" placeholder="Password"><br>
<input type="submit" value="Login">
<input type="submit" value="Register new user">
</form>

<p class="errorMessageStyle">
<?php 
$errorLogin = $params['ErrorMessage'];
echo $errorLogin;
?>
</p>

</header>

    <form>
        <input type="search" name="tag" placeholder="Find posts by tags">
        <input type="submit" value="Search">      
    </form>
    
    <main class="center_text"role="main">
        <div class="image"></div>
     
        <section>
        <nav id="primary_nav_wrap">
        <ul>
            <li><a href="#contact">|Contact| </a>
                <li><a href="#about"> About|</a>
                <li><a href="#categories">Categories|</a>
                <ul>
      <li><a href="travel">Travel</a></li>
      <li><a href="fashion">Fashion</a></li>
      <li><a href="general">General</a></li>
      <li><a href="inspiration">Inspiration</a>

        </ul>
    </nav>
    </section>
        
    <section>

        <?php 
        $posts = $params[posts];
        foreach ($posts as $i => $post) :
        ?>

             <article>
                <h1><?php echo $post->getTitle(); ?></h1>
                <p><?php echo $post->getCategory(); ?></p>
                <h2><?php echo $post->getDate(); ?></h2>
                <p><?php echo $post->getBody(); ?></p>

                <?php if (!empty($post->getImageUrl())) {
                    $url = $post->getImageUrl();
                    echo "<img src='$url' width='800' height='500'>";
                } ?>
                
                <?php 
                $tagmodel = $params['tagModel'];
                $tags = $tagmodel->getTagsOfPost($post->getId());
                

                // variable_att_spara_return_värde_i = $objektet_name->funktionens_name($paramterns_namn);
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



