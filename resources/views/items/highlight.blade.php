<!DOCTYPE html>
<html lang="en">
<head>
    <title>Highlight Items | Cafe System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="max-w-7xl mx-auto py-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-4">Highlight Items of the Day</h1>
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">Item Name</th>
                    <th class="px-4 py-2">Highlight</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menuItems as $item)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $item->name }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('items.toggleHighlight', $item->item_id) }}" method="POST">
                                @csrf
                                <select name="highlight" onchange="this.form.submit()" class="rounded-md border-gray-300 shadow-sm">
                                    <option value="1" {{ $item->highlight_id ? 'selected' : '' }}>Highlighted</option>
                                    <option value="0" {{ !$item->highlight_id ? 'selected' : '' }}>Not Highlighted</option>
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
