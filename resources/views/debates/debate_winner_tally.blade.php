<tr style="background-color: white; font-weight: bold;">
    <td><!--Blank for formatting--></td>
    <td><!--Blank for formatting--></td>
    <td><!--Blank for formatting--></td>
    <td><!--Blank for formatting--></td>
    <td>Apandah Wins: {{ $season->getWinCountForMember('apandah') }}</td>
    <td>Aztro Wins: {{ $season->getWinCountForMember('aztro') }}</td>
    @if ($season->season == 1)
        <td>Jschlatt Wins: {{ $season->getWinCountForMember('schlatt') }}</td>
    @endif
    <td>Mika Wins: {{ $season->getWinCountForMember('mika') }}</td>
    <td>Guest Wins: {{ $season->getTotalGuestWins() }}</td>
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
