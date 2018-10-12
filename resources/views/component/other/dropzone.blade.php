<div class="m-dropzone dropzone m-dropzone--{{$d_class ?? 'success'}}" id="{{$d_id}}" action="{{$d_url}}">
    <div class="m-dropzone__msg dz-message needsclick">
        <h3 class="m-dropzone__msg-title">
            {{$d_title ?? 'Drop files here or click to upload.'}}
        </h3>
        <span class="m-dropzone__msg-desc">{{$d_msg ?? 'Only image, pdf and psd files are allowed for upload'}}</span>
    </div>
</div>