<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Incoming Orders | Cafe System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="max-w-7xl mx-auto py-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-4">Incoming Orders</h1>
        <p class="text-gray-600">Here you can view all incoming customer orders.</p>
        <!-- Orders Table -->
        <div class="bg-white shadow-sm rounded-lg mt-6 p-6">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">Order ID</th>
                        <th class="px-4 py-2">Customer Name</th>
                        <th class="px-4 py-2">Order Items</th>
                        <th class="px-4 py-2">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Placeholder rows -->
                    <tr class="border-b">
                        <td class="px-4 py-2">1</td>
                        <td class="px-4 py-2">John Doe</td>
                        <td class="px-4 py-2">Coffee, Sandwich</td>
                        <td class="px-4 py-2">$15</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
