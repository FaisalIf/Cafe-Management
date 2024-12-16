<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | Cafe System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-orange-600">Cafe System</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700"></span></span>
                    <a href="{{ route('logout') }}"
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">


        <div class="mt-8 px-4 sm:px-0">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Quick Actions</h3>
            <div class="grid grid-cols-1 gap-6">

                <div class="rounded-lg scrollbar-hidden overflow-scroll md:overflow-auto">
                    <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-md">
                        <thead class="bg-gray-200 text-gray-600">
                            <tr>
                                <th class="py-3 px-6 text-left">Item Name</th>
                                <th class="py-3 px-6 text-left">Quantity</th>
                                <th class="py-3 px-6 text-left">Price Per Item</th>
                                <th class="py-3 px-6 text-left">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td colspan="4" class="text-center py-4">No orders available.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>



            </div>
        </div>

        <!-- Quick Actions Section -->
        <div class="mt-8 px-4 sm:px-0">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Quick Actions</h3>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <a href="{{ route('menu.view') }}" class="bg-white overflow-hidden shadow-sm rounded-lg hover:shadow-lg transition">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900">View Menu</h3>
                        <p class="mt-2 text-gray-600">Browse our delicious selection of food and beverages.</p>
                    </div>
                </a>

                <a href="{{ route('order.track') }}" class="bg-white overflow-hidden shadow-sm rounded-lg hover:shadow-lg transition">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900">Track Order</h3>
                        <p class="mt-2 text-gray-600">View the status of your current orders.</p>
                    </div>
                </a>
            </div>
        </div>
    </main>
</body>
</html>
