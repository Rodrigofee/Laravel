<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller
{

  public function lista()
  {

    $produtos = DB::select('select * from produtos');

    $data = ['produtos' => $produtos];

    if (view()->exists('listagem')) {
      return view('listagem', $data);
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
    return view('detalhes')->with('p', $resposta[0]);
  }
}
