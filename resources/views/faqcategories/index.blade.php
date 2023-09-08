@extends('varenykyAdmin::app')

@section('title', __('VarenykyFaq::admin.faqcategories.index.title'))

@section('content_header')
    <ul class="list-inline mb-0">
        <li class="list-inline-item me-5"><strong>{{ __('VarenykyFaq::admin.faqcategories.index.title') }}</strong></li>

        <li class="list-inline-item">
            <input type="text" class="form-control d-inline-block" id="search_bar" name="search_bar"
                placeholder="search categories ...">
        </li>
    </ul>
@stop

@section('create-btn', route('admin.faqcategories.create'))

@section('content')
<div class="card border p-3">
    <table class="table table-striped">
        <thead>
            <tr class="table-dark">
                <th>{{ __('VarenykyFaq::labels.name') }}</th>
                <th width="200"></th>
            </tr>
        </thead>
        <tbody id="tbody">
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td align="right">@include('varenykyAdmin::actions', [
                        'route' => 'admin.faqcategories',
                        'entity' => $category,
                    ])</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">{{ __('VarenykyFaq::labels.empty') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>    
    {!! $categories->links() !!}
@stop

@section('js')
    <script type="text/javascript">
        // Search with inputfield    
        $('document').ready(function() {
            $("#search_bar").keyup((function() {
                var searchTerm = $(this).val();
                console.log(searchTerm);
                $.post(
                    "{{ route('admin.faqcategories.searchFaqCategories') }}", {
                        _token: "{{ csrf_token() }}",
                        search_term: searchTerm
                    }
                ).done(function(data) {
                    $('#tbody').html(data);
                });
            }));
        });
    </script>
@stop
