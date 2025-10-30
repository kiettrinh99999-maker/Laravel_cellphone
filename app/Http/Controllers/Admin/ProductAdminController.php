<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DB;

class ProductAdminController extends Controller
{
    public function showForm(){
         $db = DB::getInstance();
         $categories=$db->getAll('Categories');
         $brands = $db->getAll('Brands', [
                "columns" => ["id_brand", "name"], 
                "where" => "status=1"
            ]);
        //  $userID=session('admin');
        return view('admin.product',compact('categories','brands'));
    }

    public function postProduct(Request $request)
    {
        try {
            $db = DB::getInstance();

            // Validate dữ liệu
            $request->validate([
                'name' => 'required|string|max:255',
                'slug_name' => 'required|string',
                'slug_description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'category' => 'required|string|max:100',
                'description' => 'required|string',
                'images' => 'required|array|min:1',
                'images.*' => 'image|mimes:jpeg,png,webp,jpg,gif|max:2048',
                'brand' => 'required|string|max:100',
                'tags' => 'nullable|array',
                'tags.*' => 'string|max:50',
            ]);

            // Upload ảnh
                $imagePaths = [];
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $file) {
                        $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $imgDirectory = public_path('img');
                        if (!file_exists($imgDirectory)) {
                            mkdir($imgDirectory, 0755, true);
                        }
                        $file->move($imgDirectory, $imageName);
                        $imagePaths[] = $imageName;
                    }
                }

            // Lấy dữ liệu
            $options = [
                "name" => $request->input('name'),
                "slug_name" => $request->input('slug_name'),
                "slug_description" => $request->input('slug_description'),
                "price" => $request->input('price'),
                "id_category" => $request->input('category'),
                "description" => $request->input('description'),
                "image" => json_encode($imagePaths),
                "id_brand" => $request->input('brand'),
                "tags" => json_encode($request->input('tags', [])),
            ];

            // Gọi hàm insert
            $db->insert('Products', $options);

            return redirect()->route('formProduct')->with('success', 'Product added successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Lỗi validate
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

}
