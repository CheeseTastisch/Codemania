@if($head)
    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap {{ $class }}">{{ $slot }}</th>
@else
    <td class="px-6 py-4 {{ $class }}">{{ $slot }}</td>
@endif
