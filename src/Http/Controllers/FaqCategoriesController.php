<?php

namespace VarenykyFaq\Http\Controllers;


use VarenykyFaq\Models\Categories;
use VarenykyFaq\Repositories\FaqCategoryRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Varenyky\Http\Controllers\BaseController;

class FaqCategoriesController extends BaseController
{
    public function __construct(FaqCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): View
    {
        $categories = $this->repository->getAllPaginated();

        return view('VarenykyFaq::Faq.categories.index', ['categories' => $categories]);
    }

    public function create(): View
    {
        return view('VarenykyFaq::Faq.categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $create = $request->except(['_token']);

        $categories = $this->repository->create($create);

        return redirect()->route('admin.faqcategories.index')->with('success', __('labels.added'));
    }

    public function edit(Categories $faqcategory): View
    {
        return view('VarenykyFaq::Faq.categories.edit', compact('faqcategory'));
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
