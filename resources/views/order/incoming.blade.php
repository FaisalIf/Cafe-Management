<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incoming Orders</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Incoming Orders</h1>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Order ID</th>
                    <th class="px-4 py-2 border">Customer ID</th>
                    <th class="px-4 py-2 border">Order Date</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Total Amount</th>
                    <th class="px-4 py-2 border">Payment Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr>
                    <td class="px-4 py-2 border">{{ $order->order_id }}</td>
                    <td class="px-4 py-2 border">{{ $order->customer_id }}</td>
                    <td class="px-4 py-2 border">{{ $order->order_date }}</td>
                    <td class="px-4 py-2 border">{{ $order->status }}</td>
                    <td class="px-4 py-2 border">${{ $order->total_amount }}</td>
                    <td class="px-4 py-2 border">{{ $order->payment_status }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center px-4 py-2">No incoming orders.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
