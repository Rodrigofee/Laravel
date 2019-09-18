@extends('layout/principal')

@section('conteudo')
<div class="container">
  <h1>Alterar Produto {{$p->nome}}</h1>

  <form action="/produtos/update" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <label>Nome</label>
      <input type="hidden" name="id" value="{{$p->id}}">
      <input class="form-control" type="text" name="nome" value="{{$p->nome}}" />

      <label>Valor</label>
      <input class="form-control" type="number" name="valor" value="{{$p->valor}}" />

      <label>Descrição</label>
      <input class="form-control" type="text" name="descricao" value="{{$p->descricao}}" />

      <label>Quantidade</label>
      <input class="form-control" type="number" name="quantidade" value="{{$p->quantidade}}" />
      <br>
      <input name="post" type="hidden" value="1">
      <button type="submit" class="btn btn-primary btn-block">Salvar</button>
    </div>
  </form>
</div>
@stop