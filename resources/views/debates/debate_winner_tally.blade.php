<tr style="background-color: white; font-weight: bold;">
    <td><!--Blank for formatting--></td>
    <td><!--Blank for formatting--></td>
    <td><!--Blank for formatting--></td>
    <td><!--Blank for formatting--></td>
    <td>Apandah Wins: {{ $apandahWins }}</td>
    <td>Aztro Wins: {{ $aztroWins }}</td>
    <td>Jschlatt Wins: {{ $schlattWins }}</td>
    <td>Mika Wins: {{ $mikaWins }}</td>

    @if (App\Models\Debate::whereHasGuestThatWon())
        <td>Guest Wins: {{ App\Models\Debate::getTotalGuestWins() }}</td>
    @else
        <td><!-- Blank for formatting --></td>
    @endif

    <td><!-- Blank for formatting --></td>

    @guest
        <td class="text-center">
            Displaying {{ $debates->firstItem() }} - {{ $debates->lastItem() }} / {{ $debates->total() }}
        </td>
    @endguest

    @if (Auth::check())
        <td><!-- Blank for formatting --></td>
        <td><!--Blank for formatting--></td>
        <td class="text-center">
            Displaying {{ $debates->firstItem() }} - {{ $debates->lastItem() }} / {{ $debates->total() }}
        </td>
    @endif
</tr>
