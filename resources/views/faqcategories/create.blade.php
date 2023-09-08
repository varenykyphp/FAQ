@extends('varenykyAdmin::app')

@section('title', __('VarenykyFaq::admin.faqcategories.create.title'))

@section('content_header')
    <strong>{{ __('VarenykyFaq::admin.faqcategories.create.title') }}</strong>
@stop

@section('save-btn', route('admin.faqcategories.store'))
@section('back-btn', route('admin.faqcategories.index'))

@section('content')
    <form action="{{ route('admin.faqcategories.store') }}" method="POST" id="nopulpForm">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card border p-3">
                    <div class="mb-3">
                        <label for="name_1" class="form-label">{{ __('VarenykyFaq::labels.name') }}</label>
                        <input type="text" required class="form-control" id="name" name="name"
                            placeholder="{{ __('VarenykyFaq::labels.name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="sort_order" class="form-label">{{ __('VarenykyFaq::labels.sort_order') }}</label>
                        <input type="number" step="1" required class="form-control" id="name" name="sort_order"
                            placeholder="{{ __('VarenykyFaq::labels.sort_order') }}">
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('js')
@stop
