<div class="col-md-4 multimedia mb-5">
    <div class="img" style="background-image: url('{{ asset('storage/'.$multimedia->publicImage()) }}')">
        <div class="format">{{ $multimedia->format }}</div>
    </div>
    <div class="p-3">
        <p class="date">
            {{ $multimedia->dateStringFormat() }}
        </p>
        <div class="name-comparsa text-truncate">
            @if($multimedia->comparsa)
                <a href="{{ $multimedia->comparsa->publicLink() }}">
                    {{ $multimedia->comparsa->name }}
                </a>
            @endif
        </div>
        <div class="title border-bottom-1">
            <a href="{{ $multimedia->publicLink() }}">
                {{ $multimedia->title }}
            </a>
        </div>
        <div class="row pt-3">
            <div class="col-6">
                <a href="{{ $multimedia->publicLink() }}">VER ARCHIVO</a>
            </div>
            <div class="col-6 text-end">
                <a href="{{ $multimedia->publicLink() }}">
                    <img src="{{ asset('images/arrow-right.svg') }}" class="img-fluid">
                </a>
            </div>
        </div>
    </div>
</div>
