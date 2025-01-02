@extends('layouts.app') <!-- Extende o layout base 'app.blade.php' -->


@section('content') <!-- Define a seção 'content' que será inserida no layout base -->
<h1>Noite do Hambúrguer</h1>
<div class="header">
    <img src="{{ asset('images/family.jpg') }}" alt="Família" class="img-fluid" style="max-width: 100%; height: auto;">
</div>
<h1>Pedidos</h1>
<a href="{{ route('orders.create') }}" class="btn btn-primary">Adicionar Pedido</a>




@if (session('success')) <!-- Verifica se existe uma mensagem de sucesso na sessão -->
    <div class="alert alert-success mt-3">
        {{ session('success') }} <!-- Exibe a mensagem de sucesso -->
    </div>
@endif




<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome Cliente</th>
            <th>Hamburger</th>
            <th>Complementos</th>
            <th>Bebidas</th>
            <th>Molho</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order) <!-- Itera sobre a lista de usuários -->
        <tr>
            <td>{{ $order->id }}</td> <!-- Exibe o ID do usuário -->
            <td>{{ $order->client_name }}</td>
            <td>{{ $order->burger_type }}</td> 
            <td>{{ $order->burger_salad }}</td>
            <td>{{ $order->drink }}</td>
            <td>{{ $order->sauce }}</td>
            <td>
                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Editar</a> <!-- Link para editar -->
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;"> <!-- Formulário para excluir -->
                    @csrf <!-- Token de proteção contra CSRF -->
                    @method('DELETE') <!-- Método para exclui -->
                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button> <!-- Botão para excluir -->
                </form>
            </td>
        </tr>
        @endforeach <!-- Fim da iteração -->
    </tbody>
</table>
@endsection <!-- Fim da seção 'content' -->