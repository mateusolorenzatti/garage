<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProprietarioModel extends CI_Model {

    public function registrar($proprietario) {

        if ($this->db->insert('proprietario', $proprietario)) {
            return true;
        }
        return false;
    }

    public function verificaLogin($email, $senha) {
        $this->db->where('email', $email);
        $this->db->where('senha', $senha);

        $query = $this->db->get('proprietario');

        if ($query->result() && $query->num_rows() === 1) {
            return true;
        } else {
            return false;
        }
    }

    public function buscaProprietarioPorEmail($email) {
        $this->db->where('email', $email);

        return $this->db->get('proprietario')->result_array();
    }
    
    public function buscaProprietarioPorId($id) {
        $this->db->where('idProprietario', $id);

        return $this->db->get('proprietario')->row_array();
    }

    public function emailCadastrado($email) {
        $this->db->where('email', $email);

        $query = $this->db->get('proprietario');

        if ($query->result() && $query->num_rows() === 1) {
            return true;
        } else {
            return false;
        }
    }

    public function veículosEmServiço($id) {
        $select = " SELECT *"
                . " From serviço"
                . " Join veiculo          ON  veiculo.idVeiculo = serviço.veiculo "
                . " Where veiculo.proprietario = " . $id . " "
                . " And serviço.status != 'Finalizado'";

        $result = $this->db->query($select)->result_array();

        return $result;
    }

    public function meusVeículos($id) {
        $select = " SELECT *"
                . " From veiculo"
                . " Natural Join proprietario p"
                . " Where p.idProprietario = " . $id . " "
                . " And p.idProprietario = veiculo.proprietario";

        $result = $this->db->query($select)->result_array();

        return $result;
    }

    public function quantidadeDeVeiculos($id) {
        $this->db->where('proprietario', $id);

        $query = $this->db->get('veiculo')->result_array();

        return count($query);
    }

    public function quantidadeDeServiços($id) {
        $this->db->where('proprietario', $id);

        $query = $this->db->get('veiculo')->result_array();

        $quant = 0;
        foreach ($query as $veiculo) {
            $this->db->where('veiculo', $veiculo['idVeiculo']);

            $quant += count($this->db->get('serviço')->result_array());
        }

        return $quant;
    }

    public function editarPerfil($idProprietario, $proprietario) {
        $this->db->where('idProprietario', $idProprietario);

        if ($this->db->update('proprietario', $proprietario)) {
            return true;
        }
        return false;
    }

}
