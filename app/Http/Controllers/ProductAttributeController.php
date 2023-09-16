<?php

namespace App\Http\Controllers;

use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function store(Request $request) {
        $attribute = ProductAttribute::create($request->all());
        return response()->json($attribute, 201);
    }

    public function destroy($id) {
        $attribute = ProductAttribute::findOrFail($id);
        $attribute->delete();
        return response()->json(null, 204);
    }
}
