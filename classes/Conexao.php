<?php
 
class Conexao {
 
   /*
   * Declaração dos atributos da classe de conexão
   */
 
   private $host; // Endereço do servidor do banco de dados
   private $bd; // Banco de dados utilizado na conexão
   private $usuario; // Usuário do banco de dados que possua acesso ao schema
   private $senha; // Senha do usuário
   private $sql; // Consulta a ser executada
 
   function conectar(){
      /*
      * Método que conecta ao banco de dados passando
      * os valores necessários para que a conexão ocorra
      */
      $conexao = mysql_connect($this->host,$this->usuario,$this->senha) or die($this->mensagem(mysql_error()));
      return $conexao;
   }
 
   function selecionarDB(){
      /*
      * Método que seleciona o banco de dados
      */
 
      $banco = mysql_select_db($this->bd) or die($this->mensagem(mysql_error()));
      if($banco){
         return true;
      }else{
         return false;
      }
   }
 
   function executar(){
      /*
      * Método que executa uma query no banco de dados
      */
      $query = mysql_query($this->sql) or die ($this->mensagem(mysql_error()));
      return $query;
   }
 
   function set($propriedade,$valor){
  
      $this->$propriedade = $valor;
   }
 
   function mensagem($erro){
    
      echo $erro;
   }
}
 
?>
