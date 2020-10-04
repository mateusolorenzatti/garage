<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class VeiculoModel extends CI_Model {

    public function adicionarVeiculo($veiculo) {
        $veiculo['proprietario'] = $this->session->userdata('idProprietario');
        
        if ($this->db->insert('veiculo', $veiculo)) {
                return true;
        }
        return false;
    }

    public function idVeiculoPorPlaca($placa) {
        $this->db->where('placa', $placa);

        return $this->db->get('veiculo')->row()->idVeiculo;
    }

    public function veiculoPorId($idVeiculo) {
        $this->db->where('idVeiculo', $idVeiculo);

        return $this->db->get('veiculo')->row();
    }

    public function editarVeiculo($veiculo, $idVeiculo) {
        $this->db->where('idVeiculo', $idVeiculo);

        if ($this->db->update('veiculo', $veiculo)) {
            return true;
        }
        return false;
    }

    public function excluirVeiculo($idVeiculo) {
        $this->db->where('idVeiculo', $idVeiculo);

        if ($this->db->delete('veiculo')) {
            return true;
        }
        return false;
    }

}
