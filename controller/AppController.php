<?php

require_once('AprendizController.php');

class AppController {
    private $aprendiz;

    public function __construct() {
    }

    public function main() {
        $obj = isset($_GET['obj'])?$_GET['obj'] : 'menu';
        if ($obj == 'menu') {
            include_once('view/menu.php');
            return;
        } else if ($obj == 'aprendiz') {
            if (!$this->aprendiz) {
                $this->aprendiz = new AprendizController();
            }
            $this->aprendiz->main();
        }
    }
}

?>