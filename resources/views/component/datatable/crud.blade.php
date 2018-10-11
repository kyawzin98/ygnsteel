<a href="{{route($edit_link,$data->id)}}" class="btn btn-outline-accent m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill m-btn--air j_edit">
    <i class="la la-list"></i>
</a>
<a href="javascript:" class="btn btn-outline-danger m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill m-btn--air"
   onclick='swal({
           title: "Are you sure?",
           text: "You will not be able to recover this imaginary file!",
           type: "warning",
           showCancelButton: true,
           confirmButtonColor: "#3085d6",
           cancelButtonColor: "#d33",
           confirmButtonText: "Yes, delete it!",
           cancelButtonText: "No, cancel please!",
           }).then(function () {
           document.getElementById("delete_{{$data->id}}").submit();
           swal(
           "Deleted!",
           "Your file has been deleted.",
           "success"
           )
           });'>
    <i class="la la-trash"></i>
</a>

<form id="delete_{{$data->id}}" action="{{ route($delete_link,$data->id) }}" method="POST" style="display: none;">
    {{method_field('DELETE')}}
    {{ csrf_field() }}
</form>