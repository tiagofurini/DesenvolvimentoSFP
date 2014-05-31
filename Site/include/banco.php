<?php
class banco
   {
        private $conn;
        private $db;
        private $query;
        private $data;
        
        //<!-------------- Construtor da Classe -------------------------------------------------------------------------- >
        function __construct($cnn, $base)
           {
                $this->conn=$cnn;
                $this->db=base; 
           }

        //<!-------------- Excluir Registros ----------------------------------------------------------------------------- >
        function excluir($tabela, $campo, $id)
            {
                $this->query="DELETE FROM $tabela WHERE $campo=$id";
                mysql_query($this->query) or die ("Erro: Nao foi possivel excluir o registro na base !!! ");               
            }           
    } // Fim da Classe banco
?>