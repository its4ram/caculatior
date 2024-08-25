<?php
function calculate($expression) {
    // Remove any whitespace from the expression
    $expression = str_replace(' ', '', $expression);
    
    // Handle basic math operations
    try {
        // Evaluate the expression
        $result = eval('return ' . $expression . ';');
        if ($result === false) {
            throw new Exception('Invalid Expression');
        }
        return $result;
    } catch (Exception $e) {
        return 'Error';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $display = isset($_POST['display']) ? $_POST['display'] : '';

    if (isset($_POST['button'])) {
        $button = $_POST['button'];

        // If 'C' is pressed, clear the display
        if ($button == 'C') {
            $display = '';
        }
        // If '=' is pressed, calculate the result
        elseif ($button == '=') {
            $display = calculate($display);
        } else {
            // Append the pressed button to the display
            $display .= $button;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="calculator">
        <form action="calculator.php" method="post">
            <input type="text" name="display" id="display" value="<?php echo htmlspecialchars($display); ?>" readonly>
            <div class="buttons">
                <input type="submit" name="button" value="1">
                <input type="submit" name="button" value="2">
                <input type="submit" name="button" value="3">
                <input type="submit" name="button" value="+">
                <input type="submit" name="button" value="4">
                <input type="submit" name="button" value="5">
                <input type="submit" name="button" value="6">
                <input type="submit" name="button" value="-">
                <input type="submit" name="button" value="7">
                <input type="submit" name="button" value="8">
                <input type="submit" name="button" value="9">
                <input type="submit" name="button" value="*">
                <input type="submit" name="button" value="0">
                <input type="submit" name="button" value="C">
                <input type="submit" name="button" value="=">
                <input type="submit" name="button" value="/">
            </div>
        </form>
    </div>
</body>
</html>
