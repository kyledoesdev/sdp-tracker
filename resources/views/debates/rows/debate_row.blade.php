<td><i class="fa fa-check"></i></td>
<td><i class="fa fa-times"></i></td>
@if ($debate->apandah === null)
    <td><i class="fa fa-minus"></i></td>
@else
    <td @if($debate->apandah) style="background-color: #67C76E" @else style="background-color: #EF5F5F" @endif>
        <i @if($debate->apandah) class="fa fa-check" @else class="fa fa-times" @endif></i>
    </td>
@endif
@if ($debate->aztro === null)
    <td><i class="fa fa-minus"></i></td>
@else
    <td @if($debate->aztro) style="background-color: #67C76E" @else style="background-color: #EF5F5F" @endif>
        <i @if($debate->aztro) class="fa fa-check" @else class="fa fa-times" @endif></i>
    </td>
@endif
@if ($debate->schlatt === null)
    <td><i class="fa fa-minus"></i></td>
@else
    <td @if($debate->schlatt) style="background-color: #67C76E" @else style="background-color: #EF5F5F" @endif>
        <i @if($debate->schlatt) class="fa fa-check" @else class="fa fa-times" @endif></i>
    </td>
@endif
@if ($debate->mika === null)
    <td><i class="fa fa-minus"></i></td>
@else
    <td @if($debate->mika) style="background-color: #67C76E" @else style="background-color: #EF5F5F" @endif>
        <i @if($debate->mika) class="fa fa-check" @else class="fa fa-times" @endif></i>
    </td>
@endif