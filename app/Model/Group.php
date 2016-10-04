<?php
App::uses('AppModel', 'Model');
/**
 * Proyecto Model
 *
 */
class Group extends AppModel {
    
 public $validate = array(
    'nombre' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Solo numeros ',
				//'allowEmpty' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
     
     'usuario' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Solo numeros ',
				'allowEmpty' => false,
				'required' => false,
                'message' => 'Solo requeridosssss ',
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
    );
    
   
    
}