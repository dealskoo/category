<?php

namespace Dealskoo\Category\Http\Controllers\Admin;

use Dealskoo\Admin\Http\Controllers\Controller as AdminController;
use Dealskoo\Category\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends AdminController
{
    public function index(Request $request)
    {
        if (!$request->user()->canDo('categories.index')) {
            abort(403);
        }
        if ($request->ajax()) {
            return $this->table($request);
        } else {
            return view('category::admin.category.index');
        }
    }

    private function table(Request $request)
    {
        $start = $request->input('start', 0);
        $limit = $request->input('length', 10);
        $keyword = $request->input('search.value');
        $columns = ['id', 'name', 'slug', 'country_id', 'index', 'parent_id'];
        $column = $columns[$request->input('order.0.column', 0)];
        $desc = $request->input('order.0.dir', 'desc');
        $query = Category::query();
        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
            $query->orWhere('slug', 'like', '%' . $keyword . '%');
        }
        $query->orderBy($column, $desc);
        $count = $query->count();
        $categories = $query->skip($start)->take($limit)->get();
        $rows = [];
        $can_view = $request->user()->canDo('categories.show');
        $can_edit = $request->user()->canDo('categories.edit');
        $can_destroy = $request->user()->canDo('categories.destroy');
        foreach ($categories as $category) {
            $row = [];
            $row[] = $category->id;
            $row[] = $category->name;
            $row[] = $category->slug;
            $row[] = $category->country->name;
            $row[] = $category->index;
            $row[] = $category->parent ? $category->parent->name : '';
            $view_link = '';
            if ($can_view) {
                $view_link = '<a href="' . route('admin.categories.show', $category) . '" class="action-icon"><i class="mdi mdi-eye"></i></a>';
            }

            $edit_link = '';
            if ($can_edit) {
                $edit_link = '<a href="' . route('admin.categories.edit', $category) . '" class="action-icon"><i class="mdi mdi-square-edit-outline"></i></a>';
            }
            $destroy_link = '';
            if ($can_destroy) {
                $destroy_link = '<a href="javascript:void(0);" class="action-icon delete-btn" data-table="categories_table" data-url="' . route('admin.categories.destroy', $category) . '"> <i class="mdi mdi-delete"></i></a>';
            }
            $row[] = $view_link . $edit_link . $destroy_link;
            $rows[] = $row;
        }
        return [
            'draw' => $request->draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $rows
        ];
    }

    public function show(Request $request, $id)
    {
        if (!$request->user()->canDo('categories.show')) {
            abort(403);
        }
        $category = Category::query()->findOrFail($id);
        return view('category::admin.category.show', ['category' => $category]);
    }

    public function create(Request $request)
    {

    }

    public function store(Request $request)
    {

    }

    public function edit(Request $request, $id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy(Request $request, $id)
    {

    }
}
