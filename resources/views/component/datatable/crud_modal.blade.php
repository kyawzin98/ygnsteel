<a class="data_jedit btn btn-outline-success m-btn m-btn--icon m-btn--icon-only m-btn--pill" data-id="{{$data->id}}"
   data-editlink="{{route($edit_link,$data->id)}}" data-updatelink="{{route($update_link,$data->id)}}" href="javascript:">
    <i class="fa flaticon-edit"></i>
</a>

<a class="data_jdel btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill" href="javascript:"
data-del_link="{{route($delete_link,$data->id)}}">
    <i class="la la-trash"></i>
</a>
