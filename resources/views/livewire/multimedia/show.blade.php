<div>
    <div class="row">
        @foreach($multimedias as $multimedia)
            @include('frontend.multimedia.col-multimedia',['multimedia'=>$multimedia])
        @endforeach
    </div>
    @if ($paginate AND $multimedias->count())
        <div class="row">
            <div class="col-md-12 text-center">
                {{ $multimedias->links() }}
            </div>
        </div>
    @endif
</div>
