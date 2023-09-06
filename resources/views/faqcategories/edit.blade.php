@extends('backend.layouts.auth')

@section('title', __('admin.faqcategories.edit.title'))

@section('content_header')
<strong>{{ __('admin.faqcategories.edit.title') }}</strong>
@stop

@section('save-btn', route('admin.faqcategories.update', $faqcategory))
@section('back-btn', route('admin.faqcategories.index'))

@section('content')
<form action="{{ route('admin.faqcategories.update', $faqcategory) }}" method="POST" id="nopulpForm">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name_1" class="form-label">{{ __('labels.name') }} Nederlands</label>
        <input type="text" required class="form-control" id="name" name="name_1" value="{{ $faqcategory->name_1 }}">
    </div>
    <div class="mb-3">
        <label for="name_2" class="form-label">{{ __('labels.name') }} Engels</label>
        <input type="text" required class="form-control" id="name" name="name_2" value="{{ $faqcategory->name_1 }}">
    </div>
    <div class="mb-3">
        <label for="name_3" class="form-label">{{ __('labels.name') }} Duits</label>
        <input type="text" required class="form-control" id="name" name="name_3" value="{{ $faqcategory->name_1 }}">
    </div>
    <div class="mb-3">
        <label for="sort_order" class="form-label">{{ __('labels.sort_order') }}</label>
        <input type="number" step="1" required class="form-control" id="email" name="sort_order" value="{{ $faqcategory->sort_order }}">
    </div>
</form>
@stop

@section('js')
@stop