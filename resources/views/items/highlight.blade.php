<!DOCTYPE html>
<html lang="en">
<head>
    <title>Highlight Items | Cafe System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="max-w-7xl mx-auto py-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-4">Highlight Items of the Day</h1>
        
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Item Name</th>
                    <th class="py-3 px-6 text-left">Current Status</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse ($menuItems as $item)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6">{{ $item->name }}</td>
                        <td class="py-3 px-6">
                            {{ $item->highlight_id ? 'Highlighted' : 'Not Highlighted' }}
                        </td>
                        <td class="py-3 px-6">
                            <form action="{{ route('items.toggleHighlight', $item->item_id) }}" method="POST">
                                @csrf
                                <select name="highlight" class="form-select mr-2">
                                    <option value="0" {{ !$item->highlight_id ? 'selected' : '' }}>Remove Highlight</option>
                                    <option value="1" {{ $item->highlight_id ? 'selected' : '' }}>Add Highlight</option>
                                </select>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    Update
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">No menu items found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>