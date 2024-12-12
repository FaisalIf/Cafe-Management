<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Order Status | Cafe System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="max-w-7xl mx-auto py-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-4">Update Order Status</h1>
        <p class="text-gray-600">Modify the status of customer orders.</p>
        <!-- Update Order Form -->
        <div class="bg-white shadow-sm rounded-lg mt-6 p-6">
            <form>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Order ID</label>
                    <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">New Status</label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option>Pending</option>
                        <option>In Progress</option>
                        <option>Completed</option>
                        <option>Canceled</option>
                    </select>
                </div>
                <button type="submit" class="bg-orange-600 text-white px-4 py-2 rounded-md">Update Status</button>
            </form>
        </div>
    </div>
</body>
</html>
