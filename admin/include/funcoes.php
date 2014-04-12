<?php
   function valida_sessao($sessao)
   { 
       if (!$sessao)
         $var = false;
       else
          $var = true;
        return($var);    
    } // Fim da funcao  
//=========================================================================================================

function valida_data($data)
  {
        $v = explode("/", $data);
        if(count($v) == 3)
          {
                 return(checkdate($v[1], $v[0], $v[2]));      
          } // Fim do comando if          
        else
           return(false); 
  } // Fim da Funчуo
//=========================================================================================================

function converte_data_mysql($data)
  {
        $v = explode("/", $data);
        return("'".$v[2]."/".$v[1]."/".$v[0]."'");       
  } // Fim da Funчуo
//=========================================================================================================

function retorna_data_mysql($data)
  {
        $v = explode("-", $data);
        return($v[2]."/".$v[1]."/".$v[0]);       
  } // Fim da Funчуo
//=========================================================================================================

function DMY($data)
  {
        $v = explode("-", $data);
        return($v[2]."/".$v[1]."/".$v[0]);       
  } // Fim da Funчуo
//=========================================================================================================

function CompBrancosD($par, $npar)
  {
        $quantidade = strlen($par);        
        if ($quantidade < $npar)
          {
            for ($i=$quantidade; $i<=$npar; $i++)
              {
                $espaco .= "&nbsp;";
              }
          }
        return($espaco);
  } // Fim da Funчуo
//=========================================================================================================
?>