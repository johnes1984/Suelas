<?php
class UsuariosController extends AppController{
    public $helpers = array('Html','Form');
    public $components = array('Session');
    
    public function index()
    {
             
        $this->set('estudaintes',$this ->Usuario ->findByProy_Id('1'));
        
    }
    
    
    
    public function  cargar()
    {
     
     $this -> set('estudaintes',$this -> Usuario ->find('all'));
        
    }
        

   
        
        

    
    
    public function add() {
   
        if($this->request->is('post')){
        
        if($this->Usuario->save($this->request->data)){
        
        $this->Session->setFlash('Estudiante guardado');
        $this->redirect('ProyectosController/carga');
        
        }
        
        }
        
        
	}
    
        public function suprimir() {
   
        if($this->request->is('post')){
        
        $entity = $this->Articles->get(2);
$result = $this->Articles->delete($entity);
            
        if($this->Usuario->save($this->request->data)){
        
        $this->Session->setFlash('Estudiante guardado');
        $this->redirect(array('action' =>'index'));
        
        }
        
        }
        
        
	}
    
    
}
      
  