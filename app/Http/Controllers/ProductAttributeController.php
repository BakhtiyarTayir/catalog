<?php

namespace App\Http\Controllers;

use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductAttributeController extends Controller
{

    public function index()
    {
        $productAttributes = ProductAttribute::all();
        
        return response()->json($productAttributes);
    }
    public function store(Request $request) {
        $attribute = ProductAttribute::create($request->all());
        return response()->json($attribute, 201);
    }

    public function destroy($id) {
        try {
            $attribute = ProductAttribute::findOrFail($id);
            $attribute->delete();
    
            Log::info('ProductAttribute with id ' . $id . ' deleted successfully.');
            
            return response()->json(['message' => 'ProductAttribute deleted'])->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            Log::error('An error occurred while deleting ProductAttribute: ' . $e->getMessage());
            
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
}
