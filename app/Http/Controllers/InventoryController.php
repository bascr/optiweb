<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Inventory;
use DB;
use Exception;
use View;

class InventoryController extends Controller
{
    public function show() {

        // raw query: SELECT *, COUNT(*) AS 'entry_number', SUM(quantity) as 'sum_products' FROM inventories GROUP BY(created_at)

        try {

            $inventories = DB::table('inventories')->join('users', 'inventories.users_username', '=', 'users.username')->select(DB::raw('inventories.id, inventories.created_at, inventories.users_username, count(*) as quantity_registers, sum(inventories.quantity) as quantity_products, users.name, users.last_name'))->groupBy('inventories.created_at')->orderBy('inventories.created_at', 'desc')->paginate(7);

            return view('inventory.show', compact('inventories'));

        } catch(Exception $e) {

            $message = [
                'content'=>'No se encontraron registros de inventario'
            ];
            return view('inventory.messages', compact('message'));
        }
    }

    public function showBarCode($date) {

        $inventories = Inventory::where('created_at', $date)->paginate(2);

        if($inventories == null) {
            $message = [
                'content'=>'No se encontraron registros de inventario'
            ];
            return view('inventory.messages', compact('message'));
        }

        return view('inventory.barcode', compact('inventories'));

    }

}
