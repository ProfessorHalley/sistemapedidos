@extends('layouts.app') <!-- Extende o layout base 'app.blade.php' -->


@section('content') <!-- Define a seção 'content' que será inserida no layout base -->
<h1>Adicionar Pedido</h1>
<form action="{{ route('orders.store') }}" method="POST"> <!-- Formulário para adicionar um novo -->
    @csrf <!-- Token de proteção contra CSRF -->
    <div class="mb-3">
        <label for="client_name" class="form-label">Nome do Cliente</label>
        <input type="text" name="client_name" id="client_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="burger_type" class="form-label">Hamburger</label>
        <input type="text" name="burger_type" id="burger_type" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="burger_salad" class="form-label">Complementos</label>
        <input type="text" name="burger_salad" id="burger_salad" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="drink" class="form-label">Bebida</label>
        <input type="text" name="drink" id="drink" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="sauce" class="form-label">Molho</label>
        <input type="text" name="sauce" id="sauce" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Adicionar</button> <!-- Botão para enviar o formulário -->
</form>
@endsection <!-- Fim da seção 'content' -->