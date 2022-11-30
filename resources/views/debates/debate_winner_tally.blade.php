<tr style="background-color: white; font-weight: bold;">
    <td><!--Blank for formatting--></td>
    <td><!--Blank for formatting--></td>
    <td><!--Blank for formatting--></td>
    <td><!--Blank for formatting--></td>
    <td>Apandah Wins: {{ $apandahWins }}</td>
    <td>Aztrosist Wins: {{ $aztroWins }}</td>
    <td>Jschlatt Wins: {{ $schlattWins }}</td>
    <td>Mikasacus Wins: {{ $mikaWins }}</td>
    <td><!-- Blank for formatting --></td>
    @if ($GuestDebates::where('was_there_a_guest', true)->count() > 0)
        <td>Guest Wins: {{ 'Wins: ' . $GuestDebates::where('guest', true)->count() }}</td>
    @endif
    <td class="text-center">
        Displaying {{ $debates->firstItem() }} - {{ $debates->lastItem() }} / {{ $debates->total() }}
    </td>
    @if (Auth::check())
        <td><!--Blank for formatting--></td>
        <td><!--Blank for formatting--></td>
    @endif
</tr>
