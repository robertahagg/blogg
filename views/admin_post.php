<section>
    <h2>New blog post</h2>
    <form class="post_form" action="newPost" method="post">

        <label for="title">Title:</label>
        <input class="single_line_box" type="text" id="" name="title">

        <label for="body">Body:</label>
        <textarea class="body_box" id="" name="body"></textarea>

        <label for="image_url">Media url:</label>
        <input class="single_line_box" type="url" id="" name="image_url">

        <label for="category">Categories:</label>
        <?php
            $categories = $params[categories];
            foreach ($categories as $i => $category) :
        ?>
        <input type="radio" name="category" value="<?php echo $category->getId(); ?>">

        <?php echo $category->getName(); ?>

        <?php endforeach; ?>

            <label for="tag">Tags:</label>
            <?php
                $tags = $params[tags];
                foreach ($tags as $i => $tag) :
            ?>
                <input type="checkbox" name="tags[]" value="<?php echo $tag->getId(); ?>">
                #<?php echo $tag->getName(); ?>

        <?php endforeach; ?>

        <div class="button">
            <button type="submit">Create Post</button>
        </div>
    </form>
</section>