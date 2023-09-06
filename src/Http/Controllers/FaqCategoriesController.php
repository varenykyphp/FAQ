<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFaqCategoriesRequest;
use App\Models\Faq\Categories;
use App\Repositories\FaqCategoryRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FaqCategoriesController extends Controller
{
    public function __construct(FaqCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): View
    {
        $categories = $this->repository->getAllPaginated();

        return view('backend.admin.faqcategories.index', ['categories' => $categories]);
    }

    public function create(): View
    {
        return view('backend.admin.faqcategories.create');
    }

    public function store(StoreFaqCategoriesRequest $request): RedirectResponse
    {
        $create = $request->except(['_token']);

        $categories = $this->repository->create($create);

        return redirect()->route('admin.faqcategories.index')->with('success', __('labels.added'));
    }

    public function edit(Categories $faqcategory): View
    {
        return view('backend.admin.faqcategories.edit', compact('faqcategory'));
    }

    public function update(Request $request, Categories $faqcategory): RedirectResponse
    {
        $update = array_filter($request->except(['_token', '_method']));
        if (isset($update['password'])) {
            $update['password'] = Hash::make($update['password']);
        }
        $this->repository->update($faqcategory->id, $update);

        return redirect()->route('admin.faqcategories.edit', $faqcategory->id)->with('success', __('labels.updated'));
    }

    public function destroy(Categories $faqcategory): RedirectResponse
    {
        $faqcategory->delete();

        return redirect()->route('admin.faqcategories.index')->with('error', __('labels.deleted'));
    }
}
