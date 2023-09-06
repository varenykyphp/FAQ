@forelse ($categories as $category)
<tr>
    <td>{{ $category->name_1 }}</td>
    <td align="right">@include('varenykyAdmin::actions', ['route' => 'admin.faqcategories', 'entity' => $category])
    </td>
</tr>
@empty
<tr>
    <td colspan="2">{{ __('VarenykyFaq::labels.empty') }}</td>
</tr>
@endforelse