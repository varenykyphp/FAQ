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
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card border p-3">
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('VarenykyFaq::labels.faq_categories_id') }}</label>
                        <select name="faq_category_id" class="form-select mb-3" aria-label="Default select example">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">{{ __('VarenykyFaq::labels.body') }} </label>
                        <textarea required class="tiny form-control" name="body" id="body" rows="4">{{ $faqitem->body }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="sort_order" class="form-label">{{ __('VarenykyFaq::labels.sort_order') }}</label>
                        <input type="number" step="1" required class="form-control" id="sort_order" name="sort_order"
                            value="{{ $faqitem->sort_order }}">
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('js')
<script>
    $(document).ready(function(){
        @php
            if (in_array(request()->server('REMOTE_ADDR'), ['127.0.0.1'])) {
                $plugins = '"link lists link table hr wordcount code"';
            } else {
                $plugins = "'link lists link table hr wordcount code'";
            }
        @endphp

        tinymce.init({
            selector: '.tiny',
            height: 250,
            plugins: {!! $plugins !!},
            toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link hr paste wordcount",
            paste_data_images: true,
            setup: function(editor) {
                editor.on("change keyup", function(e) {
                    tinyMCE.triggerSave();
                    editor.save();
                    window.$(editor.getElement()).trigger('change');
                });
            }
        });
    });
</script>
@stop
