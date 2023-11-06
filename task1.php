<!DOCTYPE html>
<html>
<head>
    <title>PHP Argument Viewer</title>
</head>
<body>
    <h1>Argument Viewer</h1>
    
    <?php
    // Check if the 'arg1' parameter is set in the URL
    if (isset($_GET['arg1'])) {
        // Get the value of 'arg1' and display it
        $arg1 = $_GET['arg1'];
        echo "arg1 value: $arg1";
    } else {
        // Display a message if 'arg1' is not provided
        echo "Please provide a value for 'arg1' in the URL.";
    }
    ?>
</body>
</html>
