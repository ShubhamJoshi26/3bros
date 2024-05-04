@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://3bros.in/public/front/images/logo.png" class="logo" alt="3Bros" width="100%" height="100%">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
