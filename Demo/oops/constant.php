<?php
class goodbye{
    const message = "Thanks for visit ";
}

echo goodbye::message;
echo "<br>";
?>

<?php
class greetmessage{
    const greetmessage = "Hello good afternoon";
    public function newmessage(){
        echo self::greetmessage;
    }
}

$greetmessage = new greetmessage();
$greetmessage->newmessage();
?>