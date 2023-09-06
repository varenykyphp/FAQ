<?php

namespace VarenykyFaq\Http\Controllers;

use VarenykyFaq\Models\Item;
use VarenykyFaq\Repositories\FaqItemRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Varenyky\Http\Controllers\BaseController;
use VarenykyFaq\Models\Categories;

class FaqItemsController extends BaseController
{
    public function __construct(FaqItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): View
    {
        $items = $this->repository->getAllPaginated();

        return view('VarenykyFaq::Faqitems.index', ['items' => $items]);
    }

    public function create(): View
    {
        return view('VarenykyFaq::Faqitems.create', [
            'categories' => Categories::get(),
        ]
        );
    }

    public function store(Request $request): RedirectResponse
    {
        $create = $request->except(['_token']);

        $items = $this->repository->create($create);

        return redirect()->route('admin.faqitems.index')->with('success', __('VarenykyFaq::labels.added'));
    }

    public function edit(Item $faqitem): View
    {
        return view('VarenykyFaq::Faqitems.edit', compact('faqitem'), [
            'categories' => Categories::get(),
        ]);
    }

    public function update(Request $request, Item $faqitem): RedirectResponse
    {
        $update = array_filter($request->except(['_token', '_method']));
        if (isset($update['password'])) {
            $update['password'] = Hash::make($update['password']);
        }
        $this->repository->update($faqitem->id, $update);

        return redirect()->route('admin.faqitems.edit', $faqitem->id)->with('success', __('VarenykyFaq::labels.updated'));
    }

    public function destroy(Item $faqitem): RedirectResponse
    {
        $faqitem->delete();

        return redirect()->route('admin.faqitems.index')->with('error', __('VarenykyFaq::labels.deleted'));
    }
}
