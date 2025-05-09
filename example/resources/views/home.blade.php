<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Simple PHP Script</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>Welcome!</h1>
    <?php
        // This is PHP code embedded in HTML
        echo "Today is " . date("l"); // Outputs the current day of the week
    ?>
</body>
</html>
