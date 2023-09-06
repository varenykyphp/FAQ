<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFaqItemsRequest;
use App\Models\Faq\Categories;
use App\Models\Faq\Item;
use App\Repositories\FaqItemRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FaqItemsController extends Controller
{
    public function __construct(FaqItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): View
    {
        $items = $this->repository->getAllPaginated();

        return view('backend.admin.faqitems.index', ['items' => $items]);
    }

    public function create(): View
    {
        return view('backend.admin.faqitems.create', [
            'categories' => Categories::get(),
        ]
        );
    }

    public function store(StoreFaqItemsRequest $request): RedirectResponse
    {
        $create = $request->except(['_token']);

        $items = $this->repository->create($create);

        return redirect()->route('admin.faqitems.index')->with('success', __('labels.added'));
    }

    public function edit(Item $faqitem): View
    {
        return view('backend.admin.faqitems.edit', compact('faqitem'), [
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

        return redirect()->route('admin.faqitems.edit', $faqitem->id)->with('success', __('labels.updated'));
    }

    public function destroy(Item $faqitem): RedirectResponse
    {
        $faqitem->delete();

        return redirect()->route('admin.faqitems.index')->with('error', __('labels.deleted'));
    }
}
