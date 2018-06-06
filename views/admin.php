<header>
    <h1 class="header_admin"> Welcome Admin!</h1>
    <nav>
        <ul>
            <button><a class="logout" href="logout">Log out</a></button>
        </ul>
    </nav>
    <h2></h2>
    <div class="image"></div>
</header>
<section>
   <button><a href="newPost">Create a new post</a></button>

</section>
<section>
    <h2>Dashboard for your posts</h2>
    <table>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Author</th>
            <th>Category</th>
            <th>Tags</th>
        </tr>
        <?php
            $posts = $params[posts];
            foreach ($posts as $i => $post) :
            ?>
        <tr>
            <td>
                <?php echo $post->getTitle(); ?>
            </td>
            <td>
                <?php echo $post->getDate(); ?>
            </td>
            <td>
                <?php echo $post->getTitle(); //author ?>
            </td>
            <td>
                <?php echo $post->getCategory(); ?>
            </td>
            <td>
            <!-- Tags -->
            </td>
            <td>
            <!-- Edit -->
            </td>
            <td>
            <?php
                    $id = $post->getId();
                    echo "<a href='admin/posts/$id'><button>Edit</button></a>";
                 ?>
            </td>
            <td>
                <?php
                    $id = $post->getId();
                    echo "<form class='post_form' action='deletePost/$id' method='post'>";
                 ?>
                    <div class="button">
                        <button type="submit"> X Delete </button>
                    </div>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>
</section>