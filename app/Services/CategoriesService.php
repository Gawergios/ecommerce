<?php
namespace App\Services;
use App\Models\Categories;
use App\Traits\SaveImages;
use Illuminate\Support\Facades\File;

class CategoriesService
{
    use SaveImages;

    public function getCategories()
    {
        return $categories = Categories::paginate('10');
    }

    public function store($request)
    {
        if ($request->file('image')) {
            $path = "assets/admin/images/categories";
            $filename = $this->saveImage($request->file('image'), $path);
        } else {
            $filename = "noImage.jpg";
        }

        $create = Categories::create(
            [
            'name' => $request->name,
            'image' => $filename,
            ]
        );

    return $create;

    }

    public function update($id, $request)
    {
        $category = Categories::find($id);

        if ($request->file('image')) {
            if ($category->image != "noImage.jpg") {
                File::delete(public_path('assets/admin/images/categories/' . $category->image));
            }
            $path = "assets/admin/images/categories";
            $filename = $this->saveImage($request->file('image'), $path);
            $category->image = $filename;
        }

        $category->name = $request->name;
        $update = $category->update();
        return $update;

    }

    public function destroy($id)
    {
        $category = Categories::find($id);
        $category->products()->delete();
        $delete = $category->delete();
        return $delete;
    }
}
