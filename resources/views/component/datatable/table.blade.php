<div id="resize_wrapper">
    <table id="{{$id ?? 'j_table'}}" class="table table-bordered my_table my_table--{{$head_class ?? ''}}" cellspacing="0">
        <thead>
        <tr>
            {{$th}}
        </tr>
        </thead>
        <tfoot>
        <tr>
            {{$th}}
        </tr>
        </tfoot>
    </table>

</div>