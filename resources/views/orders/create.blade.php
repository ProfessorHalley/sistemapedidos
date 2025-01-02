@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Pedido</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <!-- Nome do Cliente -->
        <div class="mb-3">
            <label for="client_name" class="form-label">Nome do Cliente</label>
            <input type="text" name="client_name" id="client_name" class="form-control" required>
        </div>

        <!-- Hambúrguer -->
        <div class="mb-3">
            <label class="form-label">Escolha o Hambúrguer</label>
            <div class="d-flex flex-wrap">
                @foreach(['150 gramas', '250 gramas', 'Duplo 150 gramas'] as $burger)
                <div class="card m-2" style="width: 10rem;">
                    <img src="/images/{{ strtolower(str_replace(' ', '_', $burger)) }}.png" class="card-img-top" alt="{{ $burger }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $burger }}</h5>
                        <input type="radio" name="burger_type" value="{{ $burger }}" class="form-check-input">
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Complementos -->
        <div class="mb-3">
            <label class="form-label">Escolha os Complementos</label>
            <div class="d-flex flex-wrap">
                @foreach(['Queijo','Queijo Duplo', 'Bacon', 'Ovo', 'Cebola', 'Alface', 'Tomate'] as $complement)
                <div class="card m-2" style="width: 10rem;">
                    <img src="/images/{{ strtolower(str_replace(' ', '_', $complement)) }}.png" class="card-img-top" alt="{{ $complement }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $complement }}</h5>
                        <input type="checkbox" name="burger_salad[]" value="{{ $complement }}" class="form-check-input">
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Bebida -->
        <div class="mb-3">
            <label class="form-label">Escolha a Bebida</label>
            <div class="d-flex flex-wrap">
                @foreach(['Coca-Cola', 'Coca-Cola Zero', 'Guarana', 'Suco', 'Milkshake'] as $drink)
                <div class="card m-2" style="width: 10rem;">
                    <img src="/images/{{ strtolower(str_replace(' ', '_', $drink)) }}.png" class="card-img-top" alt="{{ $drink }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $drink }}</h5>
                        <input type="radio" name="drink" value="{{ $drink }}" class="form-check-input">
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Molho -->
        <div class="mb-3">
            <label class="form-label">Escolha o Molho</label>
            <div class="d-flex flex-wrap">
                @foreach(['Maionese', 'Ketchup', 'Mostarda', 'All'] as $sauce)
                <div class="card m-2" style="width: 10rem;">
                    <img src="/images/{{ strtolower(str_replace(' ', '_', $sauce)) }}.png" class="card-img-top" alt="{{ $sauce }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $sauce }}</h5>
                        <input type="radio" name="sauce" value="{{ $sauce }}" class="form-check-input">
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Botão de Enviar -->
        <button type="submit" class="btn btn-success">Adicionar</button>
    </form>
</div>
@endsection
