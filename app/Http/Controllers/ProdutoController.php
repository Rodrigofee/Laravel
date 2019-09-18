<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Validator;
use estoque\Produto;
use Request;
use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller
{
  public function altera($id)
  {

    $produto = Produto::find($id);

    return view('produtos.altera')->with('p', $produto);
  }


  public function update()
  {
    $post = Request::input('post');
    if ($post == 1) {
      $id = Request::input('id');
      $params = Request::all();
      $produto = Produto::find($id);
      $produto->update($params);

      return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }
  }
  public function remove($id)
  {
    /*
     *Não deleta a linha do banco, apenas desativa a exibição;
     */
    $produto = Produto::find($id);
    $params['ativo'] = 0;
    $produto->update($params);
    /*--Deleta a linha do banco--
     *$produto = Produto::find($id);
     *$produto->delete();
     *
     *Redirect para a pagina principal;
     */
    return redirect()
      ->action('ProdutoController@lista');
  }

  public function listaJson()
  {
    $produtos = Produto::all();
    return response()->json($produtos);
  }

  /*public function adiciona()
  {

    $valor = Request::input('valor');
    if ($valor > 1) {
      Produto::create(Request::all());

      return redirect()
        ->action('ProdutoController@lista')
        ->withInput(Request::only('nome'));
    } else { 
      return view('produtos.formulario')
    }
  }*/
  public function adiciona(ProdutosRequest $request)
  {

    /*$validator = Validator::make(
        ['nome' => Request::input('nome')],
        ['nome' => 'required|min:5']
    );
    //$messages = "erro!";
    if ($validator->fails())
    {
      //$messages = $validator->messages();
      return redirect()
        ->action('ProdutoController@novo');
    }*/


    Produto::create($request->all());

    return redirect()
      ->action('ProdutoController@lista')
      ->withInput(Request::only('nome'));
  }
  /*public function adiciona()
  {

    $nome = Request::input('nome');
    $descricao = Request::input('descricao');
    $valor = Request::input('valor');
    $quantidade = Request::input('quantidade');

    DB::insert(
      'insert into produtos 
    (nome, quantidade, valor, descricao) values (?,?,?,?)',
      array($nome, $valor, $descricao, $quantidade)
    );

    return redirect()
    ->action('ProdutoController@lista')
    ->withInput(Request::only('nome'));
  }*/

  public function novo()
  {
    return view('produtos.formulario');
  }
  /* public function lista(){
    $produtos = Produto::all();
    return view('produtos.listagem')->with('produtos', $produtos);
  }*/

  public function lista()
  {
   /* $limit = 10;
    $order = "order by id desc";
    $produtos = DB::select('select * from produtos where ativo = 1 ')->paginate(5);

    //$data = ['produtos' => $produtos];
    if (view()->exists('produtos.listagem')) {
      //return view('listagem', $data);
    return view('produtos.listagem')->with('produtos', $produtos);*/
    
    $produtos = DB::table('produtos')->paginate(5);

        return view('produtos.listagem', ['produtos' => $produtos]);
   
  }
  public function mostra($id)
  {
    $produto = Produto::find($id);
    if (empty($produto)) {
      return "Esse produto não existe";
    }
    return view('produtos.detalhes')->with('p', $produto);
  }
  /* public function mostra($id)
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
  }*/
}
