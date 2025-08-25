<?php 

namespace bng\Controllers; //nome ficticio q eu atribui, para ser usado no composer.json 
use bng\Controllers\BaseController;
class Main extends BaseController {
    public function index(){
        $data['nome'] = 'Bruno';
        $data['apelido'] = 'Ribeiro';
        $this->view('layouts/html_header');
        $this->view('home', $data);
        $this->view('layouts/html_footer');
    }


}