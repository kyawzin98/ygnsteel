<div class="modal fade jar_material {{$head_class ?? ''}}" id="{{$id ?? 'm_modal_basic'}}" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top: 25vh">
        <div class="modal-content">
            <div class="modal-header modal-header--{{$header_class ?? 'bg1'}}">
                <h5 class="modal-title ml-auto" id="modal_title" style="color:inherit !important;">
                    {{$title ?? 'Sin Phyu Kyun'}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:inherit !important; background-color: inherit !important;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{$slot}}
            </div>
            {{--<div class="modal-footer justify-content-center">--}}
                {{--<button type="button" class="btn btn-info m-btn m-btn--custom m-btn--air" data-dismiss="modal">--}}
                    {{--submit--}}
                {{--</button>--}}
            {{--</div>--}}
        </div>
    </div>
</div>