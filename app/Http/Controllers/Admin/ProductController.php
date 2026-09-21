<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.form', ['product' => new Product()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image_file')) {
            $data['image'] = $this->saveImage($request->file('image_file'));
        }

        Product::create($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Товар добавлен');
    }

    public function show(Product $product)
    {
        return redirect()->route('admin.products.edit', $product);
    }

    public function edit(Product $product)
    {
        return view('admin.products.form', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image_file')) {
            $this->deleteImage($product->image);
            $data['image'] = $this->saveImage($request->file('image_file'));
        }

        $product->update($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Товар обновлён');
    }

    public function destroy(Product $product)
    {
        $this->deleteImage($product->image);
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Товар удалён');
    }

    /**
     * Сохраняет файл физически в public/products/.
     * Возвращает путь вида "products/abc123.png".
     */
    private function saveImage($file): string
    {
        $dir = public_path('products');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move($dir, $filename);

        return 'products/' . $filename;
    }

    /**
     * Удаляет файл из public/products/.
     */
    private function deleteImage(?string $image): void
    {
        if (!$image) return;
        if (!str_starts_with($image, 'products/')) return;

        $path = public_path($image);
        if (file_exists($path)) {
            @unlink($path);
        }
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|integer|min:0',
            'old_price'   => 'nullable|integer|min:0',
            'badge'       => 'nullable|string|max:50',
            'size'        => 'nullable|string|max:100',
            'life'        => 'nullable|string|max:50',
            'image_file'  => 'nullable|image|max:4096',
        ]);

        unset($data['image_file']);
        return $data;
    }
}