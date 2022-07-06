<div>
    <div class="row">
        @foreach($news as $new)
            @include('frontend.news.col-new',['new'=>$new])
        @endforeach
    </div>
    @if ($paginate AND $news->count())
        <div class="row">
            <div class="col-md-12 text-center">
                {{ $news->links() }}
            </div>
        </div>
    @endif
</div>
