    <?php
    trait test{
    public function hello(){
    echo "Hello good mornig";
    }
    }
    class a {
        use test;
    }
    class b {
        use test;
    }
    $obj = new a();
    $obj->hello();
    ?>