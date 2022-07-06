<div class="col-md-4 new mb-5">
    <div class="img" style="background-image: url('{{ asset('storage/news/'.$new->image) }}')"></div>
    <div class="p-3">
        <div class="title border-bottom-1">
            <p>{{ $new->title }}</p>
        </div>
        <div class="row">
            <div class="col-6">
                <a href="{{ $new->publicLink() }}">VER HISTORIA</a>
            </div>
            <div class="col-6 text-end">
                <a href="{{ $new->publicLink() }}">
                    <img src="{{ asset('images/arrow-right.svg') }}" class="img-fluid">
                </a>
            </div>
        </div>
    </div>
</div>
