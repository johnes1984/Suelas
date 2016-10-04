<?php

class MenusController extends AppController{
    public $helpers = array('Html','Form');
    public $components = array('Session');
    

    
    



    
    
    public function add() {
      if($this->request->is('post'))
        {
            if($this->Menu->save($this->request->data))
            {   
                $this->Session->setFlash('Menu guardado','default',array('class' => 'success'));
                 $this->redirect(array('action' =>'add')); 
            }
          
           
        }
        
        
	}
    
    
    

    
    
    
    
    
   
    
    
    
}
     