<?php 

class Produto extends AppModel{
    
    public $belongsTo = array(
        'Categoria'
    );
}

?>