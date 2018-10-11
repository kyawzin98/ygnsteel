<div class="modal fade {{$head_class or ''}}" id="{{$mid or 'm_modal_basic'}}" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header {{$header_class or ''}}">
                <h5 class="modal-title ml-auto" id="modal_title" style="color:inherit !important;">
                    {{$title or 'Sin Phyu Kyun'}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:inherit !important; background-color: inherit !important;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{$slot}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>