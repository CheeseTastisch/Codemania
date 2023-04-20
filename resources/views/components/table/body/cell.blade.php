@if($header)
    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
        {{ $slot }}
    </th>
@else
    <td class="px-6 py-4">
        {{ $slot }}
    </td>
@endif
