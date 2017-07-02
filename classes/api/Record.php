<?php
	abstract class Record
	{
		protected $data; // array contendo os dados do objeto

		public function __construct($id = NULL){
			if($id){
				$object = $this->load($id);
				if($object){
					 $this->fromArray($object->toArray());
				}
			}
		} 
		
		public function __clone(){
			unset($this->data['id']);
		}
		
		public function __set($prop, $value){
			if(method_exists($this, 'set_'.$prop)){
				// Executa o método set_<propriedades>
				call_user_func(array($this, 'set_'.$prop),$value);
			}
			else{
				if ($value == NULL){
					unset($this->data[$prop]);
				}
				else{
				$this->data[$prop] = $value; // Atribui o valor da propriedade
				}
			}
		}
		public function __get($prop){
			if(method_exists($this, 'get_'.$prop)){
			return call_user_func(array($this, 'get'.$prop));
			}
			else{
				if(isset($this->data[$prop])){
				return $this->data[$prop];
				}
			}
		}

		public function __isset($prop){
			return isset($this->data[$prop]);
		}

		private function getEntity(){
			$class = get_class($this); // obtém o nome da classe
			return constant("{$class}::TABLENAME"); // Retorna a constante de classe TABLENAME
		}

		public function fromArray($data){
			$this->data = $data;
		}

		public function toArray(){
			return $this->data;
		}

		public function store(){
			$prepared = $this->prepare($this->data);

			// Verifica se tem ID ou se existe na base de dados
			if(empty($this->data['id']) or (!$this->load($this->id))){
				//incrementa o ID
				if (empty($this->data['id'])){
					$this->id = $this->getLast()+1;
					$prepared['id'] = $this->id;
				}
			
				//cria uma instrução de insert
				$sql = "INSERT INTO {$this->getEntity()}" .
				'('. implode(',', array_keys($prepared)).')'.
				' values ' .
				'('. implode(',', array_values($prepared)) . ')';
			}
			else{
				// Monta a string de UPDATE
				$sql = "UPDATE {$this->getEntity()}";
				// Monta os pares: coluna=valor
				if($prepared){
				foreach ($prepared as $column => $value) {
					if ($column !== 'id'){
						$set[] = "{$column} = {$value}";
					}
				}	
			}
					$sql .= ' SET ' . implode(',', $set);
					$sql .= ' WHERE id=' . (int) $this->data['id'];
				}	
					// Obtém transação ativa
					if($conn = Transaction::get()){
						Transaction::log($sql);
						$result = $conn->exec($sql);
						return $result;
					}
					else{
						throw new Exception('Não há transação ativa!!');
					}
			}

		public function load($id)
			{
				// Monta instrução de SELECT
				$sql = "SELECT * FROM {$this->getEntity()}";
				$sql .= ' WHERE id=' . (int) $id;

				//obtém a transação ativa
				if($conn = Transaction::get()){
					// Cria mensagem de log e executa a consulta
					Transaction::log($sql);
					$result = $conn->query($sql);

					// se tornou algum dado 
					if($result){
						//retorna os dados em forma de objeto
						$object = $result->fetchObject(get_class($this));
					}
					return $object;
					}
				else{
					throw new Exception("Não há transação ativa!!");
				}
		}

		public function delete($id = NULL){
			// o ID é o paramento ou a propriedade ID
			$id = $id ? $id : $this->id;

			// Mostra a string de UPDATE
			$sql = "DELETE FROM {$this->getEntity()}";
			$sql .= ' WHERE id=' . (int) $this->data['id'];

			//obtém a transação ativa
			if($conn = Transaction::get()){
				// faz o leg e executa o sql
				Transaction::log($sql);
				$result = $conn->exec($sql);
				return $result; //retorna o resultado
			}
			else
			{
				throw new Exception("Não há transação ativa");
				
			}
		}

		public static function find($id)
		{
			$classname = get_called_class();
			$ar = new $classname;
			return $ar->load($id);
		}

		private function getLast()
		{
			if($conn = Transaction::get())
			{
				$sql = "SELECT max(id) FROM {$this->getEntity()}";

				//Cria o log e executa a instrução SQL
				Transaction::log($sql);
				$result= $conn->query($sql);

				//retorna os dados do banco
				$row = $result->fetch();
				return $row[0];
			}
			else
			{
				throw new Exception("Não há transação ativa");
				
			}
		}

		public function prepare($data)
		{
			$prepared = array();
			foreach ($data as $key => $value) {
				if(is_scalar($value))
				{
					$prepared[$key] = $this->escape($value);
				}
			}
			return $prepared;
		}

		public function escape($value)
		{
			if(is_string($value) and (!empty($value)))
			{
				// Adciona sem aspas
				$value = addslashes($value);
				return "'$value'";
			}
			else if (is_bool($value))
			{
				return $value ? 'TRUE': 'FALSE';
			}
			else if($value!=='')
			{
				return $value;
			}
			else
			{
				return "NULL";
			}
		}
	}
?> 