<?php
class CategoriasController extends AppController{

    public function index(){
        $this->layout = 'ajax';
        $this->loadModel('Faixaetariavalidade');
        $this->set('categorias', $this->Categoria->find('all'));
        $this->set('faixaetariavalidades', $this->Faixaetariavalidade->find('all'));
    }

    public function add(){
        $this->layout = 'ajax';
        
    }


    public function edit($id = null){
        $this->loadModel('Faixaetariavalidade');
        $this->layout = 'ajax';
        $this->set('faixaetariavalidades', $this->Faixaetariavalidade->find('all', ['conditions' => ['categoria_id' => $id] ]));
        $this->set('categoria', $this->Categoria->findById($id));

    }

    public function delete($id = null){
        $this->layout = 'ajax';
        
        if ($id){
            $this->loadModel('Faixaetariavalidade');
            
            $this->Faixaetariavalidade->deleteAll(array('Faixaetariavalidade.categoria_id' => $id));
            
            $this->Categoria->delete($id);
            
            $response = array(
                "message" => "Categoria excluída com sucesso.",
                "action" => "index"
            );
        } else {
            $response = array(
                "message" => "ID da categoria não fornecido."
            );
        }
        
        echo json_encode($response);
        $this->autoRender = false;
    }
    
    public function save($id = null){
        $this->loadmodel('Faixaetariavalidade');
        $this->layout = 'ajax';
        $this->set('categorias', $this->Categoria->find('all'));

        if($id){
            $categoria = $this->Categoria->findById($id);

            if ($categoria) {
                $this->Categoria->id = $id;
                $this->Categoria->save($this->request->data);

                $faixaetariavalidade = $this->Faixaetariavalidade->findByCategoriaId($id);

                if ($faixaetariavalidade) {
                    $faixaetariavalidadeData = array(
                        'id' => $faixaetariavalidade['Faixaetariavalidade']['id'],
                        'limite_amarelo' => $this->request->data['limiteamarelo'],
                        'limite_vermelho' => $this->request->data['limitevermelho']
                    );
                    $this->Faixaetariavalidade->save($faixaetariavalidadeData);
                }
            }
            $response = array(
                "message" => "Categoria editada com sucesso.",
                "action" => "index"
            );
        }else{
            $this->Categoria->create();
            $this->Categoria->save($this->request->data);

            $categoria_id = $this->Categoria->id;

            $this->Faixaetariavalidade->create();
            $faixaetariavalidadeData = array(
                'categoria_id' => $categoria_id,
                'limite_amarelo' => $this->request->data['limiteamarelo'],
                'limite_vermelho' => $this->request->data['limitevermelho']
            );
            $this->Faixaetariavalidade->save($faixaetariavalidadeData);
            
            $response = array(
                "message" => "Categoria criada com sucesso.",
                "action" => "index"
            );
        }
        echo json_encode($response);
        $this->autoRender = false;
    }
}
?>