<?php
// throwing an exception

function devide($devideend, $divisor)
{
    if ($divisor == 0) {
        throw new Exception("Divison by zero");
    }
    return $devideend / $divisor;
}
try {
    echo devide(5, 0);
} catch (Exception $e) {
    echo "Unable to devide";
}

echo "<br>";

// try catch and finally

function devide2($devideend, $divisor)
{
    if ($divisor == 0) {
        throw new Exception("Divison by zero");
    }
    return $devideend / $divisor;
}
try {
    echo devide2(5, 0);
} catch (Exception $e) {
    echo "Unable to devide<br>";
} finally {
    echo "Your process has been completed";
}

function devide3($devideend, $divisor)
{
    if ($divisor == 0) {
        throw new Exception("Devided");
    }
    return $devideend / $divisor;
}
try {
    echo devide2(5, 0);
} catch (Exception $ex) {
    $code = $ex->getCode();
    $message = $ex->getMessage();
    $file = $ex->getFile();
    $line = $ex->getLine();
    echo "Exception thrown in $file on line $line:[Code $code
   ]$message ";
}
