@extends('layout.principal')
@section('conteudo')
@if(empty($produtos))
<br>
<div class="alert alert-danger">Você não tem nenhum produto cadastrado.</div>
@else
<h1>Listagem de produtos</h1>
<table class="table table-bordered table-hover">
  <tr style="background-color: maroon; color: blanchedalmond">
    <td>Produto</td>
    <td>valor</td>
    <td>Drescrição</td>
    <td>Quantidade</td>
    <td></td>
  </tr>
  @foreach ($produtos as $p)
  <tr class="{{ $p->quantidade == 1 ?'alert-danger' : ''}}">
    <td> {{$p->nome}} </td>
    <td> {{$p->valor}} </td>
    <td> {{$p->descricao}} </td>
    <td> {{$p->quantidade}} </td>
    <td>
      <a href="/produtos/mostra/{{$p->id}}">
        Visualizar
      </a>
    </td>
  </tr>
  @endforeach
</table>

@endif
<h4>
  <span class="label alert-danger pull-right">
    Um ou menos itens no estoque
  </span>
</h4>
@stop