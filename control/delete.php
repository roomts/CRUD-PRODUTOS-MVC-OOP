<?php
require_once '../classes/api/Transaction.php';
require_once '../classes/api/Connection.php';
require_once '../classes/api/Expression.php';
require_once '../classes/api/Criteria.php';
require_once '../classes/api/Repository.php';
require_once '../classes/api/Record.php';
require_once '../classes/api/Filter.php';
require_once '../classes/api/Logger.php';
require_once '../classes/api/LoggerTXT.php';
require_once '../classes/model/Produto.php';


$id = $_GET['id'];

try
{
	// inicia a transação com a base de dados
     Transaction::open('config');

	$produto = Produto::find($id);

	if($produto instanceof Produto)
	{
		$produto->delete();
               echo '<script>alert("Excluido com sucesso!"); window.location.href = "../listar.php";</script>';
	}

	else
	{
		throw new Exception("Produto não localizado");
		
	}
	Transaction::close();
}

catch(Exception $e)
{
	Transaction::rollback();
	print $e->getMessage();
}