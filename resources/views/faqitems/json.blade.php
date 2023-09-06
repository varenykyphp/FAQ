@forelse ($items as $item)
<tr>
    <td>{{ $item->name_1 }}</td>
    <td align="right">@include('backend.layouts.actions', ['route' => 'admin.faqitems', 'entity' => $item])</td>
</tr>
@empty
<tr>
    <td colspan="2">{{ __('labels.empty') }}</td>
</tr>
@endforelse