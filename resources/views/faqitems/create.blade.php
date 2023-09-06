@extends('backend.layouts.auth')

@section('title', __('admin.faqitems.create.title'))

@section('content_header')
<strong>{{ __('admin.faqitems.create.title') }}</strong>
@stop

@section('save-btn', route('admin.faqitems.store'))
@section('back-btn', route('admin.faqitems.index'))

@section('content')
<form action="{{ route('admin.faqitems.store') }}" method="POST" id="nopulpForm">
    @csrf

    <label for="name_1" class="form-label">{{ __('labels.faq_categories_id') }}</label>
    <select name="faq_category_id" class="form-select mb-3" aria-label="Default select example">
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name_1}}</option>
        @endforeach
    </select>
    <div class="mb-3">
        <label for="name_1" class="form-label">{{ __('labels.name') }} Nederlands</label>
        <input type="text" required class="form-control" id="name" name="name_1"
            placeholder="{{ __('labels.name') }} Nederlands">
    </div>
    
    <div class="mb-3">
        <label for="name_2" class="form-label">{{ __('labels.name') }} Engels</label>
        <input type="text" required class="form-control" id="name" name="name_2"
            placeholder="{{ __('labels.name') }} Engels">
    </div>
    <div class="mb-3">
        <label for="name_3" class="form-label">{{ __('labels.name') }} Duits</label>
        <input type="text" required class="form-control" id="name_3" name="name_3"
            placeholder="{{ __('labels.name') }} Duits">
    </div>
    
    <div class="mb-3">
        <label for="summernote" class="form-label">{{ __('labels.body') }} Nederlands</label>
        <textarea required class="form-control summernote" name="body_1" id="" cols="30" rows="10">{{ __('labels.name') }} Nederlands</textarea>
    </div>
    <div class="mb-3">
        <label for="summernote" class="form-label">{{ __('labels.body') }} Engels</label>
        <textarea required class="form-control summernote" name="body_2" id="" cols="30" rows="10">{{ __('labels.name') }} Engels</textarea>
    </div>
    <div class="mb-3">
        <label for="summernote" class="form-label">{{ __('labels.body') }} Duits</label>
        <textarea required class="form-control summernote" name="body_3" id="" cols="30" rows="10">{{ __('labels.name') }} Duits</textarea>
    </div>
    <div class="mb-3">
        <label for="sort_order" class="form-label">{{ __('labels.sort_order') }}</label>
        <input type="number" step="1" required class="form-control" id="name" name="sort_order"
            placeholder="{{ __('labels.sort_order') }}">
    </div>

</form>
@stop

@section('js')
@stop