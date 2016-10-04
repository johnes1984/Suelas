<?php

class GroupsController extends AppController{
    public $helpers = array('Html','Form');
    public $components = array('Session');
    
   
     public function index()
    { 
         $this->set('envio',$this->Group->find('all'));
         //$this->set('envio',$this->Group->paginate());
    }
    
    
     public function add() 
     {
      if($this->request->is('post'))
        {
            if($this->Group->save($this->request->data))
            {   
                $this->Session->setFlash('Proyecto guardado','default',array('class' => 'success'));
                 $this->redirect(array('action' =>'index')); 
            }
        }
      }
    
    
    public function  editar($id = null)
    {
        if (empty($id))
        {
            $this->Session->setFlash('Id invalido');
            return false;
        }
        else
        {
            $this->Group->id=$id;
            if($this->request->is('Get'))
            {
                $this->request->data = $this->Group->read();
            }  
            else
            {
               if($this->Group->save($this->request->data))
               {
                 $this->Session->setFlash('Grupo guardado','default',array('class' => 'success')); 
                 $this->redirect(array('action' =>'index')); 
               }
            }
        }
        
    }
    
    public function suprimir($id = null)
    {
         if (empty($id))
        {
            $this->Session->setFlash('Id invalido');
            return false;
        }
        else
        {
            $this->Group->delete($id);
            $this->Session->setFlash('Grupo eliminado','default',array('class' => 'error'));
            $this->redirect(array('action' =>'index')); 
            
        }
        
        
        
        
    }

  
    
    
    
    
    
    
}
