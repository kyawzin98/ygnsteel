<div class="m-portlet m-portlet--mobile m-portlet--accent m-portlet--head-solid-bg">
    <div class="m-portlet__head jportlet__head">
        <div class="m-portlet__head-caption" data-toggle="collapse" data-target="#j_collapse">
            <div class="m-portlet__head-title text-center">
                <h3 class="m-portlet__head-text text-center">
                    {{$title ?? "port_title"}}
                    <small>
                        {{$sub_title ?? ''}}
                    </small>
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body jportlet__body">
        {{$slot}}
    </div>
</div>