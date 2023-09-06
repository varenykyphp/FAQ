@extends('varenykyAdmin::app')

@section('title', __('VarenykyFaq::admin.faqitems.edit.title'))

@section('content_header')
    <strong>{{ __('VarenykyFaq::admin.faqitems.edit.title') }}</strong>
@stop

@section('save-btn', route('admin.faqitems.update', $faqitem))
@section('back-btn', route('admin.faqitems.index'))

@section('content')
    <form action="{{ route('admin.faqitems.update', $faqitem) }}" method="POST" id="nopulpForm">
        @csrf
        @method('PUT')
        <label for="name" class="form-label">{{ __('VarenykyFaq::labels.faq_categories_id') }}</label>
        <select name="faq_category_id" class="form-select mb-3" aria-label="Default select example">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <div class="mb-3">
            <label for="body" class="form-label">{{ __('VarenykyFaq::labels.body') }} </label>
            <textarea required class="form-control summernote" name="body" id="" cols="30" rows="10">{{ $faqitem->body }}</textarea>
        </div>

        <div class="mb-3">
            <label for="sort_order" class="form-label">{{ __('VarenykyFaq::labels.sort_order') }}</label>
            <input type="number" step="1" required class="form-control" id="email" name="sort_order"
                value="{{ $faqitem->sort_order }}">
        </div>
    </form>
@stop

@section('js')
@stop
