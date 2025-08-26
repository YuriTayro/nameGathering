<?php 

namespace bng\Controllers; //nome ficticio q eu atribui, para ser usado no composer.json 
use bng\Controllers\BaseController;
use bng\Models\Agents;
class Main extends BaseController {
    public function index(){

        $models = new Agents;
        $results = $models->get_total_Agents();
        printData($results);


        $data['nome'] = 'Bruno';
        $data['apelido'] = 'Ribeiro';
        $this->view('layouts/html_header');
        $this->view('home', $data);
        $this->view('layouts/html_footer');
    }


}