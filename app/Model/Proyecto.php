<?php
App::uses('AppModel', 'Model');
/**
 * Proyecto Model
 *
 */
class Proyecto extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'proy_id';

/**
 * Display field
 *
 * @var string
 */
	//public $displayField = 'proy_nombre';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'proy_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Solo numeros',
				//'allowEmpty' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'proy_nombre' => array(
			//'numeric' => array(
				//'rule' => array('numeric'),
				//'message' => 'Solo numeros',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		),
		'proy_descripcion' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'No puede estar en blanco',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'proy_impacto' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'No puede estar en blanco',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
