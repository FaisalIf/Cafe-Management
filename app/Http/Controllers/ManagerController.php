<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    // Incoming Orders
    public function viewIncomingOrders()
    {
        $orders = DB::table('orders')
            ->where('status', '!=', 'delivered') // Exclude delivered orders
            ->orderBy('order_id', 'desc') // Sort in descending order
            ->get();

        return view('order.incoming', compact('orders'));
    }

    public function viewOrderStatus()
    {
        $orders = DB::table('orders')->get();
        return view('order.update', compact('orders'));
    }

    public function updateOrderStatus(Request $request, $order_id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,processing,delivered,cancelled', // Example statuses
        ]);

        DB::table('orders')
            ->where('order_id', $order_id)
            ->update(['status' => $request->status]);

        return redirect()->route('order.update')->with('success', 'Order status updated successfully.');
    }

    public function viewMenuAvailability()
    {
        $menuItems = DB::table('menuitems')->get();

        return view('items.unavailable', compact('menuItems'));
    }

    public function updateAvailability(Request $request, $item_id)
    {
        $request->validate([
            'is_available' => 'required|boolean',
        ]);

        DB::table('menuitems')
            ->where('item_id', $item_id)
            ->update(['is_available' => $request->is_available]);

        return redirect()->back()->with('success', 'Item availability updated.');
    }

    public function viewHighlights()
    {
        $menuItems = DB::table('menuitems')
            ->leftJoin('dailyhighlights', 'menuitems.item_id', '=', 'dailyhighlights.item_id')
            ->select('menuitems.*', 'dailyhighlights.highlight_id')
            ->get();

        return view('items.highlight', compact('menuItems'));
    }

    public function toggleHighlight(Request $request, $item_id)
    {
        if ($request->has('highlight') && $request->highlight == true) {
            DB::table('dailyhighlights')->insert([
                'item_id' => $item_id,
                'highlight_date' => now(),
            ]);
        } else {
            DB::table('dailyhighlights')->where('item_id', $item_id)->delete();
        }

        return redirect()->back()->with('success', 'Highlight updated.');
    }
}
