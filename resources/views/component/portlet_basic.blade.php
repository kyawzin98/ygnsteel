<div class="m-portlet m-portlet--full-height  m-portlet--rounded">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    {{$title ?? 'Title'}}
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
        {{$slot}}
    </div>
</div>