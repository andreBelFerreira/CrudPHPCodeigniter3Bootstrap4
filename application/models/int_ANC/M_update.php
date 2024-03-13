<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_update extends CI_Model
{
 
    ///////////////////////////////////////////////////////////////////////////////////////////
    ///////// Objetivo: EDITA ITENS DA CONTROLE DE SAIDE DE NÃO CONFORMIDADE  /////////////////
    ///////// Criação: 04/09/2022                                   ///////////////////////////
    ///////// Autor: André Belmonte                                 ///////////////////////////
    ///////// Revisado:                                             ///////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////
    public function alterarSaidaDefeito($input)
    {
        $dados = array(
            'operacao'   =>  $input["txtOperacao"],
            'observacao'   =>  $input["txtobservacao"],
            'cod'   =>  $input["slCodrefugo"],
            'cecus'   =>  $input["txtCeCus"],
            'chapaop'   =>  $input["txtChapaOp"],
            'nmaquina'   =>  $input["txtNMaquina"],
        );

        $this->db->set($dados);
        $this->db->where('ndoc', $input["txtNumeroDoc"]);
        $AncUpdate =  $this->db->update('anc');


        if ($AncUpdate == true) {
            $msg = array(
                'cod' => '1',
                'mensagens' => 'Atualizado com sucesso!'
            );
        } else {
            $msg = array(
                'cod' => '2',
                'mensagens' => 'Erro ao atualizar!'
            );
        }
        return $msg;

    }

    function btnDeletar($id)
    {

        $this->db->set('status', 'D');
        $this->db->where('id', $id);
        $retornoDocum =  $this->db->update('anc');

        if ($retornoDocum == true) {
            $msg = array(
                'cod' => '1',
                'mensagens' => 'Deletado com sucesso!'
            );
        } else {
            $msg = array(
                'cod' => '2',
                'mensagens' => 'Erro ao deletar!'
            );
        }
        return $msg;
    }
}
