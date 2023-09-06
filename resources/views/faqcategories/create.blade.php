@extends('backend.layouts.auth')

@section('title', __('admin.faqcategories.create.title'))

@section('content_header')
<strong>{{ __('admin.faqcategories.create.title') }}</strong>
@stop

@section('save-btn', route('admin.faqcategories.store'))
@section('back-btn', route('admin.faqcategories.index'))

@section('content')
<form action="{{ route('admin.faqcategories.store') }}" method="POST" id="nopulpForm">
    @csrf
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
        <input type="text" required class="form-control" id="name" name="name_3"
            placeholder="{{ __('labels.name') }} Duits">
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