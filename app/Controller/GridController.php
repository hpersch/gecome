<?php

class GridController extends AppController {

    function index() {
        
    }

    function ajaxData($tipo) {
        $this->modelClass = "Browser";
        $this->autoRender = false;
        switch ($tipo):
            case 'departamentos':
                $output = $this->Browser->GetData('departamentos', 'id', 'nome');
                break;
        endswitch;
        echo json_encode($output);
    }

}

?>
