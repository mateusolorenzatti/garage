<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CidadeModel extends CI_Model {

    public function todasCidades() {

        $this->db->select();
        
        return $this->db->get('cidade')->result_array();
    }
    
    public function buscaCidadePorId($id) {
        $this->db->where('idCidade', $id);

        return $this->db->get('cidade')->row();
    }
    
    public function buscaNomeDaCidadePorId($id) {
        $this->db->where('idCidade', $id);

        $cidade = $this->db->get('cidade')->row();
        
        return $cidade->nome.", ".$cidade->estado;
    }
}