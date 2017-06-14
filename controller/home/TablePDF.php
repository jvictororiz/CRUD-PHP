<?php

class TablePDF {
    private $total = 0;
            
    function getTabela($produtos) {   
        $html = "";
        $totalTudo = 0;
            foreach ($produtos as $produto) :         
                $totalUnico = $produto->getValor() * $produto->getQtd();
                $totalTudo = $totalTudo + $totalUnico;
                $html = $html. '                 
                <td>
                '.$produto->getId().'
                </td>
                
                <td>
                '.$produto->getNome().'
                </td>
                
                <td>
                '.$produto->getQtd().'
                </td>      
                    
                <td>
                '.$produto->getTipo().'
                </td>
                
                <td>
                '.$produto->getValor().'
                </td>
                
                <td>
                '."R$  ".$totalUnico.'
                </td> <tr> ';
                
            
             $this->total = $this->total + $totalTudo;
            endforeach;            
            
            return  $html;
            
    }
    
    function getTotal(){
        $total = $this->total;
        if($total != 0){
            return $total;
        }
    }
}
