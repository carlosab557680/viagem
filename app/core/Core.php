<?php
class Core{
    public function start($urlGet)
    { 
        if(isset($urlGet['metodo'])){
            $acao = $urlGet['metodo'];
        }else{
            $acao = 'default';
        }  
      
        if(isset($urlGet['pagina'])){ //se existe o get pagina
            $controller = ucfirst($urlGet['pagina'].'Controller'); //ucfirst deixa a primeira letra maiuscula
			//var_dump($controller);
        }else{
            $controller = 'HomeController'; //pagina principal
        }
   
       if(!class_exists($controller)){
           $controller = 'ErroController';
		   //$controller = 'EnglobController';
		   //var_dump($controller);
       }
     
       if(isset($urlGet['id']) && $urlGet['id'] != null){
           $id = $urlGet['id'];
       }else{
           $id = null;
       }
       
       //funcao chama metodos de forma dinamica
       return call_user_func_array(array(new $controller, $acao), 
               array('id' => $id));
		//return call_user_func_array(array(new HomeController, '');


    }
}