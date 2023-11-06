<!DOCTYPE html>
<html>
<head>
    <title>Keyword Checker</title>
</head>
<body>
    <h1>Keyword Checker</h1>
    <form method="post">
        <label for="keyword">Enter a keyword to check:</label>
        <input type="text" id="keyword" name="keyword" required>
        <button type="submit">Check Keyword</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the keyword entered by the user
        $keyword = $_POST['keyword'];

        // The URL of the website to check
        $url = 'http://www.example.com';

        // Get the content of the main page of example.com
        $content = @file_get_contents($url);

        if ($content !== false) {
            // Check if the keyword is present in the content
            if (stripos($content, $keyword) !== false) {
                echo "<p>The keyword '$keyword' was found on $url.</p>";
            } else {
                echo "<p>The keyword '$keyword' was not found on $url.</p>";
            }
        } else {
            echo "<p>Failed to retrieve content from $url. Please check the URL or try again later.</p>";
        }
    }
    ?>

</body>
</html>
