<div>
    <div class="row">
        @foreach($comparsas as $comparsa)
            <div class="col-md-12">
                <div class="row col-comparsa" style="background-image: url('{{ asset('storage/'.$comparsa->image) }}');">
                    <div class="col-md-4 offset-md-8 mt-auto px-0">
                        <div class="data-comparsa p-5 mt-auto mb-md-5 me-md-5 mx-3 mb-3">
                            <h4>{{ $comparsa->name }}</h4>
                            <p>{{ Str::limit($comparsa->extract, 300, ' (...)') }}</p>

                            <div class="row">
                                <div class="col-8">
                                    <a href="{{ $comparsa->publicLink() }}">VER COMPARSA</a>
                                </div>
                                <div class="col-4 text-end">
                                    <a href="{{ $comparsa->publicLink() }}">
                                        <img src="{{ asset('images/arrow-right-white.svg') }}" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if ($paginate AND $comparsas->count())
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                {{ $comparsas->links() }}
            </div>
        </div>
    @endif
</div>
