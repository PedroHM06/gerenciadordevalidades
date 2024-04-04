<?php

class LogsController extends AppController{

    public function index(){
        $this->layout = 'ajax';
        $this->set('logs', $this->Log->find('all'));
    }
}
?>