<?php 

class Faixaetariavalidades extends AppController{

    public function index(){
        $this->layout = 'ajax';
        $this->set('faixaetariavalidades', $this->Faixaetariavalidade->find('all'));

    }

    public function add(){
        $this->layout = 'ajax';
    }

    public function edit($id = null){
        $this->layout = 'ajax';
        $this->set('faixaetariavalidade', $this->Faixaetariavalidade->findById($id));
    }

    public function delete($id = null){
        $this->layout = 'ajax';
        $this->Faixaetariavalidade->delete($id);

        $response = array(
            "menssage" => "Faixa Etária escluida com sucesso",
            'action' => 'index' 
        );

        echo json_encode($response);
        $this->autoRender = false;
    }

    public function save($id = null){

        if($id){
            $this->Faixaetariavalidade->id = $id;
            $this->Faixaetariavalidade->save($this->request->data);

        }else{

            $this->Faixaetariavalidade->create();
            $this->Faixaetariavalidade->save($this->request->data);

        }
        $this->autoRender = false;
    }

}

?>