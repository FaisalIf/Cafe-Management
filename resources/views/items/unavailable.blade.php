<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mark Item as Unavailable | Cafe System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="max-w-7xl mx-auto py-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-4">Mark Item as Unavailable</h1>
        <p class="text-gray-600">Select an item to mark as unavailable.</p>
        <!-- Unavailable Item Form -->
        <div class="bg-white shadow-sm rounded-lg mt-6 p-6">
            <form>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Item Name</label>
                    <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <button type="submit" class="bg-orange-600 text-white px-4 py-2 rounded-md">Mark Unavailable</button>
            </form>
        </div>
    </div>
</body>
</html>
