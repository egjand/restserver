<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CodigoPais_model extends CI_Model{

public $Id;
public $Codigo; 
public $Pais;

	public function ConsultarCodigo($id)
	{
		$this->db->where( array( 'id' => $id ));
		$query = $this->db->get('codigopais');

		$row = $query->custom_row_object(0, 'CodigoPais_model');

	return $row;	
}
}
	?> 