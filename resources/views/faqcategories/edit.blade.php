@extends('varenykyAdmin::app')

@section('title', __('VarenykyFaq::admin.faqcategories.edit.title'))

@section('content_header')
    <strong>{{ __('VarenykyFaq::admin.faqcategories.edit.title') }}</strong>
@stop

@section('save-btn', route('admin.faqcategories.update', $faqcategory))
@section('back-btn', route('admin.faqcategories.index'))

@section('content')
    <form action="{{ route('admin.faqcategories.update', $faqcategory) }}" method="POST" id="nopulpForm">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name_1" class="form-label">{{ __('VarenykyFaq::labels.name') }} </label>
            <input type="text" required class="form-control" id="name" name="name" value="{{ $faqcategory->name }}">
        </div>
        <div class="mb-3">
            <label for="sort_order" class="form-label">{{ __('VarenykyFaq::labels.sort_order') }}</label>
            <input type="number" step="1" required class="form-control" id="sort_order" name="sort_order"
                value="{{ $faqcategory->sort_order }}">
        </div>
    </form>
@stop

@section('js')
@stop
