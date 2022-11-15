<tr class="text-center" style="background-color: white;">
    <th>Podcast</th>
    <th class="text-nowrap">Debate / Discussion</th>
    <th>Apandah</th>
    <th>Aztrosist</th>
    <th>Jschlatt</th>
    <th>Mikasacus</th>
    @if ($GuestDebates::where('was_there_a_guest', true)->count() > 0)
        <th>Guest</th>
    @endif
    <th>Winning Side</th>
    <th class="text-nowrap">Podcast Upload Date</th>
    @if (Auth::check())
        <th>Edit</th>
        <th>Delete</th>
    @endif
</tr>
