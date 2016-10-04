<?php

class ProyectosController extends AppController{
    public $helpers = array('Html','Form');
    public $components = array('Session');
    
    public function index()
    {
             
        $this->set('proyectos',$this ->Proyecto ->find('all'));
       
    }
    
    
    
    public function  carga()
    {
     
    $this->autoRender = false;
    $result = $this ->Proyecto ->find('all');    
    return json_encode($result);  
    }
        
    
  public function  editar($id = null)
    {
        if (empty($id)){
            $this->Session->setFlash('Id invalido');
            return false;
        }
      if(!empty($this->request->data)){

           if($this->Proyecto->save($this->request->data))
            {   
                $this->Session->setFlash('Proyecto guardado','default',array('class' => 'success'));
                 $this->redirect(array('action' =>'index')); 
            }
           
      } else {
          echo  "zzzz";
          $this->request->data = $this->Proyecto->findByProyId($id); 
      }
    
        
    }
        

    
    
    public function add() {
      if($this->request->is('post'))
        {
            if($this->Proyecto->save($this->request->data))
            {   
                $this->Session->setFlash('Proyecto guardado','default',array('class' => 'success'));
                 $this->redirect(array('action' =>'index')); 
            }
          
           
        }
        
        
	}
    
    
    
     public function suprimir($id = null) {
   
      if($this->request->is('get'))
        {
                 
           $result = $this->Proyecto->delete($id);
           $this->Session->setFlash('Proyecto eliminado','default',array('class' => 'error'));
         $this->redirect(array('action' =>'index')); 
           
        }
        
        
	}
    
    
    
    
    
   
    
    
    
}
      