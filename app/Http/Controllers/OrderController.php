<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all(); // Busca todos os pedidos do banco de dados
        return view('orders.index', compact('orders')); // Retorna a view com os dados dos pedidos
    }
    public function create()
    {
        return view('orders.create'); // Retorna a view para criar um novo
    }


    public function store(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'burger_type' => 'required|string',
            'burger_salad' => 'nullable|array', // Aceita múltiplos valores
            'drink' => 'required|string',
            'sauce' => 'required|string',
        ]);
    
        // Transformar o array em string para armazenar no banco, se necessário
        $validated['burger_salad'] = isset($validated['burger_salad']) 
            ? implode(', ', $validated['burger_salad']) 
            : null;
    
        // Criar o pedido
        Order::create($validated);
    
        // Redirecionar com mensagem de sucesso
        return redirect()->route('orders.index')->with('success', 'Pedido adicionado com sucesso!');
    }
    public function edit($id)
    {
        $order = Order::findOrFail($id); // Busca o pedido pelo ID ou retorna 404 se não encontrado
        return view('orders.edit', compact('order')); // Retorna a view de edição
    }


    public function update(Request $request, $id)
    {
        // Valida os dados recebidos
        $request->validate([
            'client_name' => 'required|unique:orders,client_name,' . $id,
            'burger_type' => 'required',
            'burger_salad' => 'required',
            'drink' => 'required',
            'sauce' => 'required',
        ]);
        // Busca o pedido pelo ID
        $order = Order::findOrFail($id);
        // Atualiza os dados
        $order->update([
            'client_name' => $request->client_name,
            'burger_type' => $request->burger_type,
            'burger_salad' => $request->burger_salad,
            'drink' => $request->drink,
            'sauce' => $request->sauce,

        ]);
        return redirect()->route('orders.index')->with('success', 'Pedido atualizado com sucesso.');
    }


    public function destroy($id)
    {
        Order::findOrFail($id)->delete(); // Busca e o exclui
        return redirect()->route('orders.index')->with('success', 'Pedido excluído com sucesso.');
    }
}
