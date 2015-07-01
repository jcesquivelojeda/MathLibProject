<!DOCTYPE html>
<html>
<?php
    require_once __DIR__ . '/MathematicalLibrary.php';
    require_once __DIR__ . '/Display.php';
    require_once __DIR__ . '/Calculator.php';
    require_once __DIR__ . '/RealDao.php';
?>

<head>
    <title>MathLib</title>
</head>
<body>
<form name="FormDouble" action="#" method="post">
    <label for="number">Number:</label>
    <input type="text" id="number" name="number">
    <input type="submit" name="Double it" value="Double it">
</form>
<?php
    $value=0;
    $mathLib = new MathematicalLibrary(new Calculator(),new Display());
    $value= $_POST["number"]!=null && isset($_POST["number"]) &&  is_numeric($_POST["number"]) ? $_POST["number"]:0;
    //echo "<p style='background-color: aqua;color: black'>".$value."</p>";
    if($value!=0)
        $doubleValue = ($mathLib-> double($value));

?>

<?php if($value!==0):?>
<p style='background-color: aqua;color: black'>
    The Double of <?=$value;?> is <?=$doubleValue;?>
</p>
<?php endif;?>
</body>
</html>

