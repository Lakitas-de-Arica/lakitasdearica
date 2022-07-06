<div>
    <div class="row">
        @foreach($news as $new)
            @include('frontend.news.col-new',['new'=>$new])
        @endforeach
    </div>
</div>
