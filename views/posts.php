<!--  <form>
        <input type="search" name="tag" placeholder="Find posts by tags">
        <input type="submit" value="Search">
    </form> -->

<main class="center_text" role="main">
    <div class="image"></div>

    <section>
        <nav id="primary_nav_wrap">
            <h3>Categories</h3>
            <ul>

                <?php
$categories = $params['categories'];
foreach ($categories as $i => $category):
    $name = $category->getName();
    $id = $category->getId();

    echo "<li><a href='/categories/$id/posts/1'>$name</a></li>";
endforeach;
?>
            </ul>
        </nav>
    </section>

    <section>

        <?php
$posts = $params['posts'];
foreach ($posts as $i => $post):
?>

            <article class="container post_img">
                <h1>
                    <?php echo $post->getTitle(); ?>
                </h1>
                <p>
                    <?php echo $post->getCategory(); ?>
                </p>
                <h2>
                    <?php echo $post->getDate(); ?>
                </h2>
                <p>
                    <?php echo $post->getBody(); ?>
                </p>

                <?php if (!empty($post->getImageUrl())) {
    $url = $post->getImageUrl();
    echo "<img src='$url' width='800' height='500'>";
}?>

<p>
                <?php
$tagmodel = $params['tagModel'];
$tags = $tagmodel->getTagsOfPost($post->getId());

foreach ($tags as $i => $tag):
    $tagName = $tag->getName();
    echo "#$tagName ";
endforeach;
?>
</p>


            </article>
            <aside>
                <i class="fa fa-facepost" aria-hidden="true"></i>
                <i class="fa fa-instagram" aria-hidden="true"></i>
                <i class="fa fa-snapchat-ghost" aria-hidden="true"></i>
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </aside>
            <?php endforeach;?>

    </section>

</main>
</body>

<footer>

    <?php if ($params['currentPage'] > 1) {
    $previousPageNumber = $params['currentPage'] - 1;

    echo "<a href='/posts/$previousPageNumber' class='previous_button'>&laquo; Previous</a>";
}?>

    <?php if (!$params['isLastPage']) {
    $nextPageNumber = $params['currentPage'] + 1;

    echo "<a href='/posts/$nextPageNumber' class='next_button'> Next&raquo;</a>";
}?>

</footer>