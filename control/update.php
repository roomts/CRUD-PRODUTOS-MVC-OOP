<?php
require_once '../classes/api/Transaction.php';
require_once '../classes/api/Connection.php';
require_once '../classes/api/Logger.php';
require_once '../classes/api/LoggerTXT.php';
require_once '../classes/api/Record.php';
require_once '../classes/model/Produto.php';

$id = $_POST['id'];
$descricao = $_POST['descricao'];
$estoque = $_POST['estoque'];
$preco_custo = $_POST['preco_custo'];
$preco_venda = $_POST['preco_venda'];
$codigo_barras = $_POST['codigo_barras'];
$data_cadastro = $_POST['data_cadastro'];
$origem = $_POST['origem'];

try
{
Transaction::open('config');
//Transaction::setLogger(new LoggerTXT('/tmp/log_novo.txt'));
//Transaction::log('Alterando uma PosVenda');

$produto = Produto::find($id);

$produto = new Produto;
$produto->id = $id;
$produto->descricao = $descricao;
$produto->estoque = $estoque;
$produto->preco_custo = $preco_custo;
$produto->preco_venda = $preco_venda;
$produto->codigo_barras = $codigo_barras;
$produto->data_cadastro = $data_cadastro;
$produto->origem = $origem;

$produto->store();
Transaction::close();
echo '<script>alert("Produto Alterado Com Sucesso!"); window.location.href = "../listar.php";</script>';

}
catch (Exception $ex) {
    Transaction::rollback();
    print $ex->getMessage();
}
