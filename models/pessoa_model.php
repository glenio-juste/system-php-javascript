<?php

class Pessoa_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        $sql = "select id, nome, cpf, email, status, observacao from pessoa order by nome";
        $result = $this->db->select($sql);
        $result = json_encode($result);

        echo $result;

    }

    public function save()
    {

       try{
            $id          = $this->UUID();
            $nome        = $_POST['nome'];
            $cpf         = str_replace("-", "", str_replace(".", "", $_POST['cpf']));
            $email       = $_POST['email'];
            $status      = $_POST['status'];
            $observacao  = $_POST['observacao'];

    
            $data =  array('ID' => $id, 'NOME' => $nome, 'CPF' => $cpf, 'EMAIL' => $email, 'STATUS' => $status, 'OBSERVACAO' => $observacao);
    
            $this->db->insert("UNPTA.PESSOA", $data);

            echo "Dados Inseridos com Sucesso";
        }catch(PDOException $e){
            var_dump($e);
           die();
        }
       

    }

    public function update()
    {
        $id          = $_GET['id'];
        $nome        = $_POST['nome'];
        $cpf         = str_replace("-", "", str_replace(".", "", $_POST['cpf']));
        $email       = $_POST['email'];
        $status      = $_POST['status'];
        $observacao  = $_POST['observacao'];

        $data =  array('nome' => $nome, 'cpf' => $cpf, 'email' => $email, 'status' => $status, 'observacao' => $observacao);

        $this->db->update('pessoa', $data, "id='$id'");
       
        echo "Dados alterado com Sucesso";

    }

    public function delete()
    {
     

        $id = $_POST['id'];
        $this->db->delete('pessoa', "id='$id'");

    }

    public function findById()
    {

        $id = $_POST['id'];

        $result = $this->db->select('select id, nome, cpf, email, status, observacao from pessoa where id=:id', array(":id" => $id));
        $result = json_encode($result);
        
        echo ($result);

    }

  

}
