<?php
class UsuariosController extends AppController{

    public function index(){
        $this->layout = 'ajax';
        $this->set('usuarios', $this->Usuario->find('all'));
    }

    public function add(){
        $this->layout = 'ajax';
    }

    public function edit($id = null){
        $this->layout = 'ajax';
        $this->set('usuario', $this->Usuario->findById($id));
    }

    public function delete($id =null){
        $this->layout = 'ajax';
        print_r($this->set('usuario', $this->Usuario->findByid($id)));
        if($this->Usuario->delete($id)){
            $response = array(
                "message" => "Usuário excluido com sucesso.",
                "action" => "index"
            );
            echo $json_response = json_encode($response);
            $this->autoRender = false;
        }
    }

    public function save($id = null){
        if($id){
            $this->Usuario->id = $id;
            $this->Usuario->set($this->request->data);
            $this->Usuario->save($this->request->data);
            $response = array(
                "message" => "Usuário editado com sucesso.",
                "action" => "index"
            );
        }else{
        $this->Usuario->create();
        $this->Usuario->save($this->request->data);
        $response = array(
            "message" => "Usuário criado com sucesso.",
            "action" => "index"
        );
        }
        echo $json_response = json_encode($response);
        $this->autoRender = false;
    }

    public function login(){
        $this->layout = 'login';
    }
}
?>