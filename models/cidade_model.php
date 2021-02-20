<?php


class Cidade_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
        /* $this->findAll();
        exit(); */
    }

    public function findAll(){
        $sql = "select id, nome, uf, observacao from cidade order by nome";
        $result = $this->db->select($sql);
        $result = json_encode($result);
        //var_dump($result);
        echo $result;
    }


    public function save()
    {

       try{
            $id          = $this->UUID();
            $nome        = $_POST['nome'];            
            $uf          = $_POST['uf'];            
            $observacao  = $_POST['observacao'];
    
            $data =  array('ID' => $id, 'NOME' => $nome, 'UF' => $uf, 'OBSERVACAO' => $observacao);
    
            $this->db->insert("UNPTA.CIDADE", $data);

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
        $uf          = $_POST['uf']; 
        $observacao  = $_POST['observacao'];

        $data =  array('nome' => $nome, 'observacao' => $observacao);

        $this->db->update('cidade', $data, "id='$id'");
       
        echo "Dados alterado com Sucesso";

    }

    public function delete()
    {
        $id = $_POST['id'];
        $this->db->delete('cidade', "id='$id'");

    }

    public function findById()
    {

        $id = $_POST['id'];

        $result = $this->db->select('select id, nome, uf, observacao from cidade where id=:id', array(":id" => $id));
        $result = json_encode($result);
        
        echo ($result);

    }


}

