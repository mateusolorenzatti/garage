<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ServicoModel extends CI_Model {

    public function dadosRapidos($serviço) {
        /*
          Este método envia o nome da oficina onde o serviço está
          sendo executado, bem como a porcentagem em relação aos itens
          marcados com 'Sim'.

         */

        $this->db->where('idOficina', $serviço['oficina']);

        $serviço['nomeOficina'] = $this->db->get('oficina')->row()->nome;

        $this->db->select();
        $this->db->where('serviço', $serviço['idServiço']);
        $itens = $this->db->get('item')->result_array();

        $serviço['quantItens'] = count($itens);

        $this->db->select();
        $this->db->where('serviço', $serviço['idServiço']);
        $this->db->where('concluido', 'sim');
        
        $itensConculidos = $this->db->get('item')->result_array();

        $serviço['quantItensConcluidos'] = count($itensConculidos);
        
        return $serviço;
    }

}
