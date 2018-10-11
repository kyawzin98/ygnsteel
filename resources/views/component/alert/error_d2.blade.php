<audio autoplay>
    <source src="{{asset('other/sound/error.wav')}}">
</audio>
<div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    {{$slot}}
</div>