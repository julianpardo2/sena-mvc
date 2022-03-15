<?php

require_once('AprendizController.php');
require_once('InstructorController.php');

class AppController {
    private $aprendiz;
    private $instructor;

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
        } else if ($obj == 'instructor') {
            if (!$this->instructor) {
                $this->instructor = new InstructorController();
            }
            $this->instructor->main();
        }
    }
}

?>