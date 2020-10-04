<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OficinaModel extends CI_Model {

    public function oficinasPorCidade($idCidade) {

        $this->db->where('cidade', $idCidade);

        return $this->db->get('oficina')->result_array();
    }

    public function dadosOficina($id) {
        $select = " SELECT *"
                . " From oficina"
                . " Where oficina.idOficina = " . $id;

        $query = $this->db->query($select);

        $row = $query->row_array();
        
        return $row;
    }
    
    public function telefonesDaOficina($idOficina){
        $this->db->select('telefone');
        $this->db->where('oficina', $idOficina);

        return $this->db->get('telefone')->result_array();
    }

}
