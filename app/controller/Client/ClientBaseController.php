<?php 
    namespace App\controller\Client;
    use eftec\bladeone\BladeOne;
    class ClientBaseController{
        function render($viewFile, $data = []){
            $views = "./app/views";
            $cache = "./app/cache";
            $blade = new BladeOne($views,$cache, BladeOne::MODE_DEBUG);
            echo $blade->run($viewFile, $data);
        }
    }
?>