<?php 
class ProdutosController extends AppController {
    public $uses = array('Produto', 'Log', 'Categoria','Faixaetariavalidade');
    public function index(){
        $this->loadModel('faixa_etaria_validade');
        $this->layout = 'ajax';
        $order = array('Produto.validade' => 'asc');
        $this->set('produtos', $this->Produto->find('all', compact('order')));
        $this->set('categorias', $this->Categoria->find('all'));
        $this->set('faixaetariavalidades', $this->Faixaetariavalidade->find('all'));
       
    }

  

    public function view($id = null) {
        $this->layout = 'ajax';
        $produto = $this->Produto->findById($id);
        $this->set("produto", $produto);
    }

    public function add(){
        $this->layout = 'ajax';
        $this->set('categorias', $this->Categoria->find('all'));
    }

    public function edit($id = null){
        $this->layout = 'ajax';
        $this->set('produto', $this->Produto->findById($id));
        $this->set('categorias', $this->Categoria->find('all'));
    }

    public function delete($id = null){
        $this->layout = 'ajax';
        if ($this->Produto->delete($id)) {
            $response = array(
                "message" => "Produto deletado com sucesso.",
                "action" => "index"
            );
                echo  json_encode($response);
            }
            $this->autoRender = false;
    }

    public function save($id = null){
            if ($id) {
                $this->Produto->id = $id;
                $this->Produto->save($this->request->data);

                $response = array(
                    "message" => "Produto editado com sucesso.",
                    "action" => "index"
                );
            } else{
                $this->Produto->create();
                $this->Produto->save($this->request->data);

                $response = array(
                    "message" => "Produto criado com sucesso.",
                    "action" => "index"
                );
            }
            echo json_encode($response);
             $this->autoRender = false;
    }
}
?>