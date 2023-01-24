<tr class="text-center" style="background-color: white;">
    <th>Podcast</th>
    <th class="text-nowrap">Topic</th>
    <th>Debate</th>
    <th>Discussion</th>
    <th><a target="_blank" href="https://www.youtube.com/c/Apandah/about" class="btn btn-secondary text-white">Apandah</a></th>
    <th><a target="_blank" href="https://linktr.ee/aztrosist" class="btn btn-secondary text-white">Aztro</a></th>
    <th><a target="_blank" href="https://www.youtube.com/c/jschlattLIVE/about" class="btn btn-secondary text-white">Jschlatt</a></th>
    <th><a target="_blank" href="https://www.youtube.com/channel/UCIWEHR8n8GiLMWY8v7IP0Gg/about" class="btn btn-secondary text-white">Mika</a></th>
    @if (App\Models\Debate::hasHadGuest())
        <th>Guest</th>
    @endif
    <th>Winner</th>
    <th class="text-nowrap">Uploaded At</th>
    @if (Auth::check())
        <th>Edit</th>
        <th>Delete</th>
    @endif
</tr>
