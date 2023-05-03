<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    public function index(): Renderable
    {
        // пример вызова объекта заказа
        $order = Order::find(1);

        dd(
            // Сам заказ
            $order,
            // Товары в заказе
            $order->items,
            // Сумма заказа
            $order->total,
            // Сколько оплачено
            $order->paid_sum,
            // Оплачен ли заказ
            $order->isPaid(),
            // Статус заказа
            $order->status,
            // Количество определенного товара в заказе
            $order->items[0]->quantity,
            // За какую цену купили 1 единицу товара
            $order->items[0]->price,
            // Товар, который купили
            $order->items[0]->good

        );

        return view('home');
    }
}
