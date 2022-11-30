<tr class="text-center" style="background-color: white;">
    <th>Podcast</th>
    <th class="text-nowrap">Topic</th>
    <th>Debate</th>
    <th>Discussion</th>
    <th><a target="_blank" href="https://www.youtube.com/c/Apandah/about" class="btn btn-secondary text-white">Apandah</a></th>
    <th><a target="_blank" href="https://linktr.ee/aztrosist" class="btn btn-secondary text-white">Aztrosist</a></th>
    <th><a target="_blank" href="https://www.youtube.com/c/jschlattLIVE/about" class="btn btn-secondary text-white">Jschlatt</a></th>
    <th><a target="_blank" href="https://www.youtube.com/channel/UCIWEHR8n8GiLMWY8v7IP0Gg/about" class="btn btn-secondary text-white">Mikasacus</a></th>
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
