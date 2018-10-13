<div class="m-portlet m-portlet--head-solid-bg m-portlet--head-sm m-portlet--{{$color ?? 'primary'}} {{$head_class ?? ''}}" m-portlet="true" data-portlet="true" style="" id="{{$id ??  ''}}">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon d-none d-sm-table-cell">
                    <i class="{{$icon ?? 'flaticon-graph'}}"></i>
                </span>
                <h3 class="m-portlet__head-text">{{$title ?? 'Action Tools'}}</h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a href="" m-portlet-tool="toggle" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon btn btn-{{$color ?? 'primary'}} m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" title="" data-original-title="Collapse">
                        <i class="la la-plus"></i>
                    </a>
                </li>
                <li class="m-portlet__nav-item">
                    <a href="" m-portlet-tool="toggle" data-portlet-tool="reload" class="m-portlet__nav-link m-portlet__nav-link--icon btn btn-{{$color ?? 'primary'}} m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" title="" data-original-title="Reload">
                        <i class="la la-circle"></i>
                    </a>
                </li>
                <li class="m-portlet__nav-item">
                    <a href="#" m-portlet-tool="fullscreen" data-portlet-tool="fullscreen" class="m-portlet__nav-link m-portlet__nav-link--icon btn btn-{{$color ?? 'primary'}} m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" title="" data-original-title="Fullscreen">
                        <i class="la la-expand"></i>
                    </a>
                </li>
                <li class="m-portlet__nav-item">
                    <a href="#" m-portlet-tool="remove" data-portlet-tool="remove" class="m-portlet__nav-link m-portlet__nav-link--icon btn btn-{{$color ?? 'primary'}} m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" title="" data-original-title="Remove">
                        <i class="la la-power-off"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="m-portlet__body {{$body_class ?? ''}}">
        {{$slot}}
    </div>
</div>