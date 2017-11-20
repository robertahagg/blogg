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
            <h2>New blog post</h2>
            <form class="post_form" action="newPost" method="post">

                <label for="title">Title:</label>
                <input class="single_line_box" type="text" id="" name="title">

                <label for="body">Body:</label>
                <textarea class="body_box" id="" name="body"></textarea>

                <label for="image_url">Media url:</label>
                <input class="single_line_box" type="url" id="" name="image_url">


               <label for="category">Categories:</label>
                    <input type="radio" name="category" value="travel"> Travel
                    <input type="radio" name="category" value="Fashion"> Fashion
                    <input type="radio" name="category" value="Inspiration"> Inspiration
                    <input type="radio" name="category" value="General"> General
         

                <label for="tags">Tags:</label>
                    <input type="checkbox" name="tags" value="Example"> Example
                    <input type="checkbox" name="tags" value="Example"> Example
                    <input type="checkbox" name="tags" value="Example"> Example
                    <input type="checkbox" name="tags" value="Example"> Example

                    <div class="button">
                        <button type="submit">Create Post</button>
                  
                    </div>
                    </action>
        </section>
    </main>
</body>
<footer>
    <a href="#" class="previous_button">&laquo; Previous</a>
    <a href="#" class="next_button">Next &raquo;</a>
</footer>

</html>