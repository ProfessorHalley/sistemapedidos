@extends('layouts.app') <!-- Extende o layout base 'app.blade.php' -->
@section('content') <!-- Define a seção 'content' que será inserida no layout base -->
<h1>Editar Pedido</h1>
<form action="{{ route('orders.update', $order->id) }}" method="POST"> <!-- Formulário para editar um  existente -->
    @csrf <!-- Token de proteção contra CSRF -->
    @method('PUT') <!-- Método para atualizar -->
    <div class="mb-3">
        <label for="client_name" class="form-label">Nome Cliente</label>
        <input type="text" name="client_name" id="client_name" class="form-control" value="{{ $order->client_name }}" required> <!-- Campo para cliente com valor atual -->
    </div>
    <div class="mb-3">
        <label for="burger_type" class="form-label">Tipo de Hamburger</label>
        <input type="text" name="burger_type" id="burger_type" class="form-control" value="{{ $order->burger_type }}" required>
    </div>
    <div class="mb-3">
        <label for="burger_salad" class="form-label">Tipo de Salada</label>
        <input type="text" name="burger_salad" id="burger_salad" class="form-control" value="{{ $order->burger_salad }}" required>
    </div>
    <div class="mb-3">
        <label for="drink" class="form-label">Bebida</label>
        <input type="text" name="drink" id="drink" class="form-control" value="{{ $order->drink }}" required>
    </div>
    <div class="mb-3">
        <label for="sauce" class="form-label">Tipo de Molho</label>
        <input type="text" name="sauce" id="sauce" class="form-control" value="{{ $order->sauce }}" required>
    </div>
    <button type="submit" class="btn btn-warning">Atualizar</button> <!-- Botão para enviar o formulário -->
</form>
@endsection <!-- Fim da seção 'content' -->