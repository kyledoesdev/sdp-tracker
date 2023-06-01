<tr class="text-center" style="background-color: white;">
    <th class="pt-3">Podcast</th>
    <th class="text-nowrap pt-3">Topic</th>
    <th class="pt-3">Debate</th>
    <th class="pt-3">Discussion</th>
    <th class="p-1">
        <a target="_blank" href="https://www.youtube.com/c/Apandah/about">
            <img 
                class="border border-2 border-dark animate" 
                src="apandah.webp" 
                alt="Apandah Image" 
                width="50" 
                height="50"
            />
        </a>
    </th>
    <th class="p-1">
        <a target="_blank" href="https://insect.christmas">
            <img 
                class="border border-2 border-dark animate" 
                src="aztro.jpg" 
                alt="Aztrosist Image" 
                width="50" 
                height="50"
            />
        </a>
    </th>
    @if ($debate->season == 1)
        <th class="p-1">
            <a target="_blank" href="https://www.youtube.com/c/jschlattLIVE/about">
                <img 
                    class="border border-2 border-dark animate" 
                    src="jschlatt.jpg" 
                    alt="Jschlatt Image" 
                    width="50" 
                    height="50"
                />
            </a>
        </th>
    @endif
    <th class="p-1">
        <a target="_blank" href="https://www.youtube.com/channel/UCIWEHR8n8GiLMWY8v7IP0Gg/about">
            <img 
                class="border border-2 border-dark animate" 
                src="mikasacus.png" 
                alt="Mikasacus Image" 
                width="50" 
                height="50"
            />
        </a>
    </th>
    <th class="pt-3">Guest</th>
    <th class="pt-3">Winner</th>
    <th class="pt-3 text-nowrap">Uploaded At</th>
    @if (Auth::check())
        <th>Edit</th>
        <th>Delete</th>
    @endif
</tr>
