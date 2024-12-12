<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order Status</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Update Order Status</h1>
        @if (session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Order ID</th>
                    <th class="px-4 py-2 border">Customer ID</th>
                    <th class="px-4 py-2 border">Current Status</th>
                    <th class="px-4 py-2 border">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr>
                    <td class="px-4 py-2 border">{{ $order->order_id }}</td>
                    <td class="px-4 py-2 border">{{ $order->customer_id }}</td>
                    <td class="px-4 py-2 border">{{ $order->status }}</td>
                    <td class="px-4 py-2 border">
                        <form action="{{ route('order.updateStatus', $order->order_id) }}" method="POST">
                            @csrf
                            <div class="flex items-center space-x-2">
                                <select name="status" id="status-{{ $order->order_id }}" class="border px-2 py-1">
                                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="delivery" {{ $order->status === 'delivery' ? 'selected' : '' }}>Delivery</option>
                                    <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                                    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Update</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center px-4 py-2">No orders available.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>