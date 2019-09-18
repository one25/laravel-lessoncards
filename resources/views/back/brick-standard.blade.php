@foreach($cards as $card)
<tr>
@admin
<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" href="{{ route('cards.destroy', [$card->id]) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
<td class="col-md-6 col-sm-6 col-xs-6 center widthbutton"><a class="btn btn-primary listbuttonupdate" href="{{ route('cards.edit', [$card->id]) }}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
@endadmin
   <td>{{ $card->user->name }}</td>
   <td>{{ $card->number }}</td>  
   <td>{{ $card->card->name }}</td>   
   <td>{{ $card->card->type->name }}</td>
</tr>
@endforeach


