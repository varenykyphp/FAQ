@forelse ($categories as $category)
<tr>
    <td>{{ $category->name_1 }}</td>
    <td align="right">@include('backend.layouts.actions', ['route' => 'admin.faqcategories', 'entity' => $category])
    </td>
</tr>
@empty
<tr>
    <td colspan="2">{{ __('labels.empty') }}</td>
</tr>
@endforelse