<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller
{

  public function adiciona()
  {

    $nome = Request::input('nome');
    $descricao = Request::input('descricao');
    $valor = Request::input('valor');
    $quantidade = Request::input('quantidade');

    DB::insert('insert into produtos 
    (nome, quantidade, valor, descricao) values (?,?,?,?)', 
    array($nome, $valor, $descricao, $quantidade));

  //return view('produtos.adicionado');
  return redirect('/produtos')->withInput(Request::only('nome'));
  
}

  public function novo()
  {
    return view('produtos.formulario');
  }

  public function lista()
  {

    $produtos = DB::select('select * from produtos order by id desc limit 5');

    $data = ['produtos' => $produtos];

    if (view()->exists('produtos.listagem')) {
      //return view('listagem', $data);
      return view('produtos.listagem')->with('produtos', $produtos);
    }
  }
  public function mostra($id)
  {
    //return view('listagem')->with('produtos', array());
    if (Request::has('id')) {
      $id = Request::input('id', '0');
    }

    $resposta = DB::select('select * from produtos where id = ?', [$id]);

    if (empty($resposta)) {
      return "Esse produto não existe";
    }
    //return view('detalhes')->with('p', $resposta[0]);
    return view('produtos.detalhes')->with('p', $resposta[0]);
  }
}
