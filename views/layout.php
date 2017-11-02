<html>
<head>
    <title><?php echo 'Title goes here' ?></title>
</head>
<body>
    <div style="border: solid 1px">
        <a href="/books">Books</a>
        <a href="/customers">Customers</a>
        <hr>
        <form action="/books/search" method="get">
            <label>Title</label>
            <input type="text" name="title">
            <label>Author</label>
            <input type="text" name="author">
            <input type="submit" value="Search">
        </form>
    </div>
</body>
</html>