<?php

class Database extends PDO
{
    
    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
    {
        parent::__construct($DB_HOST, $DB_USER, $DB_PASS);
        
        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        parent::setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        parent::setAttribute( PDO::ATTR_CASE, PDO::CASE_LOWER );
     
  
		//seta o schema padrao da aplicacao, definido no config.php
		//parent::exec('SET search_path TO '.DB_SCHEMA);
        
     
    }
    
    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_OBJ)
    {
        $sth = $this->prepare($sql);
		//percorre os elementos do array para fazer o bind de cada parametro
		//com o respectivo valor
        foreach ($array as $key => $value) {
            $sth->bindValue("$key",$value);
        }
        
        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }
    
    /**
     * insert
     * @param string $table : tabela em que o dado sera inserido
     * @param string $data  : um array contendo os campos e valores
     */
    public function insert($table, $data)
    {
		//ordena o array pelas chaves (nome do campo)
        ksort($data);
        
		//monta a string do prepare com os campos e valores
        
         $fieldNames = implode('", "', array_keys($data));
         $fieldNames = '"'.$fieldNames.'"';
         
       // $fieldNames = implode(', ', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));
        

        //$sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
      
         $sth = $this->prepare("INSERT INTO $table ($fieldNames) VALUES ($fieldValues)");
        
		//percorre o array criando os parametros (:campo) e fazendo o bind com os respectivos valores
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        //executa o insert
        $sth->execute();
    }
    
    /**
     * update
     * @param string $table : tabela que deseja alterar os dados
     * @param string $data  : um array contendo os campos e valores
     * @param string $where : condicao do update
     */
    public function update($table, $data, $where)
    {
		//ordena o array pelas chaves (nome do campo)
        ksort($data);
        
        $fieldDetails = NULL;
		//monta a string do prepare com os campos do set com os parametros (:campo)
        foreach($data as $key=> $value) {
            $fieldDetails .= "$key=:$key,";
        }
		//retira a ultima virgula
        $fieldDetails = rtrim($fieldDetails, ',');
        
        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
		
        //percorre o array criando os parametros (:campo) e fazendo o bind com os respectivos valores
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        //executa o update
        $sth->execute();
    }
    
    /**
     * delete
     * 
     * @param string $table
     * @param string $where
     * @param integer $limit
     * @return integer linhas afetadas
     */
    public function delete($table, $where, $limit = 1)
    {
		//ainda falta implementar mais recursos e pode-se fazer as mesmas verificacoes do update com prepare
        return $this->exec("DELETE FROM $table WHERE $where");
    }
	
	    
}