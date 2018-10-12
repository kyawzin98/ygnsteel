<div class="m-portlet m-portlet--creative m-portlet--bordered m-portlet--bordered-semi {{$head_class ?? ''}}"  m-portlet="true" data-portlet="true" id="{{$id ?? 'j_portlet1'}}" >
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h2 class="m-portlet__head-label @isset($head_color)'m-portlet__head-label--{{$head_color}}'@else m-portlet__head-label--accent @endisset">
                    <span style="min-width: 150px;">{{$title ?? 'Set Title'}}</span>
                </h2>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a href="#" m-portlet-tool="toggle" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" title="" data-original-title="Collapse">
                        <i class="la la-angle-down {{$icon_color ?? ''}}"></i>
                    </a>
                </li>
                <li class="m-portlet__nav-item">
                    <a href="#" m-portlet-tool="toggle" data-portlet-tool="reload" class="m-portlet__nav-link m-portlet__nav-link--icon" title="" data-original-title="Reload">
                        <i class="la la-refresh {{$icon_color ?? ''}}"></i>
                    </a>
                </li>
                <li class="m-portlet__nav-item">
                    <a href="#" m-portlet-tool="remove" data-portlet-tool="remove" class="m-portlet__nav-link m-portlet__nav-link--icon" title="" data-original-title="FUlllll">
                        <i class="la la-close {{$icon_color ?? ''}}"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
	<div class="m-portlet__body {{$body_class ?? ''}}">
        {{$slot}}
    </div>
</div>