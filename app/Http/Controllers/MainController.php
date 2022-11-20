<?php

namespace App\Http\Controllers;

use App\Enums\ServerStatus;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class MainController extends Controller
{
    public function home()
    {
        $product = new Product();
        return view('home', ['products' => $product->all()]);
    }

    public function create()
    {
        return view('create');
    }

    public function find()
    {
        return view('find');
    }

    public function delete()
    {
        return view('delete');
    }

    public function create_check(Request $request)
    {
        $request['type'] = ucfirst(strtolower($request['type']));
        $valid = $request->validate([
            'number' => 'required',
            'type' => [Rule::in([ServerStatus::ONE, ServerStatus::TWO, ServerStatus::THREE]), 'required'],
            'file' => 'required',
        ]);

        $product = new Product();
        $product->number = $request->input('number');
        $product->type = $request->input('type');
        $product->file = $request->input('file');

        $product->save();
        $message = 'Запись была успешно создана';
        return view('create',['message' => $message]);
    }

    public function find_check(Request $request)
    {
        $valid = $request->validate([
            'number' => 'required'
        ]);

        $number = $request->input('number');
        $products = DB::table('products')->get()->where('number', $number);

        if (count($products) != 0) {
            return view('find', ['number' => $number, 'products' => $products]);
        } else {
            $message = 'Не существует записей с номером ' . $number;
            return view('find', ['message' => $message]);
        }
    }

    public function delete_check(Request $request)
    {
        $valid = $request->validate([
            'number' => 'required'
        ]);

        $number = $request->input('number');
        $products = DB::table('products')->get()->where('number', $number);
        foreach ($products as $item) {
            DB::table('products')->delete($item->id);
        }
        if (count($products) != 0) {
            $message = 'Записи с номером ' . $number . ' были удалены';
            return view('delete', ['message' => $message]);
        } else {
            $message = 'Не существует записей с номером ' . $number;
            return view('delete', ['message_err' => $message]);
        }
    }
}
