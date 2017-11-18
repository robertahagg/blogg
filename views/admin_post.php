<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abel|Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:200" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Single post Lynn Dylan</title>
    <link rel="stylesheet" type="text/css" href="../../adminpage.css">
</head>

<body>
    <main>
        <header>
        </header>
        <section>
            <h2>Blog post #1</h2>
            <form class="post_form" action="/posts" method="post">

                <label for="title">Title:</label>
                <input class="single_line_box" type="text" id="" name="title">

                <label for="msg">Body:</label>
                <textarea class="body_box" id="" name="user_message"></textarea>

                <label for="media_url">Media url:</label>
                <input class="single_line_box" type="media" id="" name="media_url">


                <form><label for="category">Categories:</label>
                    <input type="radio" name="category" value="travel"> Travel
                    <input type="radio" name="category" value="Fashion"> Fashion
                    <input type="radio" name="category" value="Inspiration"> Inspiration
                    <input type="radio" name="category" value="General"> General
                </form>

                <label for="category">Tags:</label>
                <form action="/action_page.php" method="get">
                    <input type="checkbox" name="category" value="Example"> Example
                    <input type="checkbox" name="category" value="Example"> Example
                    <input type="checkbox" name="category" value="Example"> Example
                    <input type="checkbox" name="category" value="Example"> Example

                    <div class="button">
                        <button type="submit">Update Post</button>
                        <button type="submit">Delete Post</button>
                    </div>
                    </action>
                </form>
        </section>
    </main>
</body>
<footer>
    <a href="#" class="previous_button">&laquo; Previous</a>
    <a href="#" class="next_button">Next &raquo;</a>
</footer>

</html>