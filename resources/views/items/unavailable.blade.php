<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mark Item as Unavailable | Cafe System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="max-w-7xl mx-auto py-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-4">Menu Availability</h1>
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">Item Name</th>
                    <th class="px-4 py-2">Availability</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menuItems as $item)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $item->name }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('items.updateAvailability', $item->item_id) }}" method="POST">
                                @csrf
                                <select name="is_available" onchange="this.form.submit()" class="rounded-md border-gray-300 shadow-sm">
                                    <option value="1" {{ $item->is_available ? 'selected' : '' }}>Available</option>
                                    <option value="0" {{ !$item->is_available ? 'selected' : '' }}>Unavailable</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
