<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Status;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('order.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $customerData = [
            'costumer_name' => $request->costumer_name,
            'costumer_surname' => $request->costumer_surname,
            'phone_number' => $request->phone_number,
            'delivery' => $request->delivery,
            'status_id' => 1,
        ];

        $products = session('cart', []);
        if($this->orderService->createOrder($customerData, $products)){
            session()->forget('cart');
        }
        return redirect()->route('order.thank-you-page');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $order = Order::with(['status', 'products.category'])->findOrFail($id);
        $statuses = Status::all();
        $total = $this->orderService->calcTotal($order);
        return view('order.show', ['order' => $order, 'statuses' => $statuses, 'total' => $total]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('order.edit-customer', ['order' => $order]);
    }

    /**
     * Update status in admin panel
     * @param Request $request
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status_id' => 'required|exists:statuses,id'
        ]);
        $order->update(['status_id' => $request->status_id]);
        return redirect()->route('order.index', $order)->with(['success' => 'status order update']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreOrderRequest $request, Order $order)
    {
        $order->costumer_name = $request->costumer_name;
        $order->costumer_surname = $request->costumer_surname;
        $order->phone_number = $request->phone_number;
        $order->delivery = $request->delivery;
        $order->save();
        return redirect()->route('order.show', $order->id)->with(['success' => 'Customer data update success']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->products()->detach();
        $order->delete();
        return redirect()->route('order.index')->with(['success' => 'Order delete']);
    }
}
