<?php
final class Repository{
	private $activeRecord; // classe manipulada pelo repositório

	function __construct($class){
		$this->activeRecord = $class;
	}

	function load(Criteria $criteria){
		//instacia a instrução de select
		$sql = "SELECT * FROM " . constant($this->activeRecord.'::TABLENAME');

		// obtém a cláusula WHERE do objeto criteria.
		if($criteria){
			$expression = $criteria->dump();
			if($expression) { 
				$sql .= ' WHERE ' . $expression;
			}

		//obtém as propriedades do critério
		$order = $criteria->getProperty('order');
		$limit = $criteria->getProperty('limit');
		$offset= $criteria->getProperty('offset');	
		

		//obtém a ordenaçãoo do SELECT
		if($order){
			$sql .= ' ORDER BY ' . $order;
		}

		if($limit) {
			$sql .= ' LIMIT ' . $limit;
		}
		if($offset){
			$sql .= ' OFFSET ' . $offset;
		}
	}

	//obtém transação ativa
	if($conn = Transaction::get()) {
		Transaction::log($sql); // registra mensagem de log

		//executa a consulta no banco de dados

		$result= $conn->Query($sql);
		$results = array();

		if($result){
			//pecorre os resultados da consulta, retornando um objeto
			while ($row = $result->fetchObject($this->activeRecord)){
				//armazena no array $results;
				$results[] = $row;
			}
		}
		return $results;
	}
	else{
		throw new Exception('Não há transação ativa!!');
		}
	}

	function delete(Criteria $criteria){
		$expression = $criteria->dump();
		$sql = "DELETE FROM " . constant($this->activeRecord.'::TABLENAME');
		if($expression){
			$sql .= ' WHERE ' . $expression;
		}
		//obtém a transação ativa
		if ($conn = Transaction::get()) {
			Transaction::log($sql); // registra a mensagem de log
			$result = $conn->exec($sql);
			return $result;
		}
		else {
			throw new Exception("Não há transação ativa");
			
		}
	}

	function count(Criteria $criteria) {
		$expression = $criteria->dump();
		$sql = "SELECT count(*) FROM " . constant($this->activeRecord.'::TABLENAME');
		if ($expression) {
			$sql .= ' WHERE ' . $expression;
		}

		//obtém transação ativa
		if ($conn = Transaction::get()) {
			Transaction::log($sql);
			$result= $conn->query($sql); // executa a instrução de SELECT
			if($result){
				 $row = $result->fetch();
			}
			return $row[0]; // retorna o resultado
		}
		else{
			throw new Exception("Não há transação ativa!!");
		}
	}
}
?>