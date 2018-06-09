<section>
    <form class="post_form" method="post">

        <label for="title">Title:</label>

        <?php
            $post = $params[post];
$title = $post->getTitle();
echo "<input class='single_line_box' type='text' id='' name='title' value='$title'>";
?>

        <label for="body">Body:</label>

        <?php
$body = $post->getBody();
echo "<input class='body_box' id='' name='body' value='$body'>";
?>

        <label for="image_url">Media url:</label>

        <?php
$image_url = $post->getImageUrl();
echo "<input class='single_line_box' type='url' id='' name='image_url' value='$image_url'>";
?>

        <label for="category_name">Categories:</label>
          <?php
$currentCategoryName = $post->getCategory();

$categories = $params[categories];

foreach ($categories as $i => $category):

    echo "<input type='radio' name='category' value='";
    echo $category->getId();
    echo "'";

    if ($currentCategoryName == $category->getName()) {
        echo ' checked';
    }
    echo ">";
    ?>

		            <?php echo $category->getName(); ?>
		        <?php endforeach;?>


        <label for="tag">Tags:</label>
            <?php
$tags = $params[tags];
foreach ($tags as $i => $tag):
?>
                <input type="checkbox" name="tags[]" value="<?php echo $tag->getId(); ?>">
                #<?php echo $tag->getName(); ?>

        <?php endforeach;?>

        <div class="button">
            <button type="submit">Save Post</button>
        </div>
    </form>
</section>