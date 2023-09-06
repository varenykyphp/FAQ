@forelse ($items as $item)
    <tr>
        <td>{{ $item->name }}</td>
        <td align="right">@include('varenykyAdmin::actions', ['route' => 'admin.faqitems', 'entity' => $item])</td>
    </tr>
@empty
    <tr>
        <td colspan="2">{{ __('VarenykyFaq::labels.empty') }}</td>
    </tr>
@endforelse
