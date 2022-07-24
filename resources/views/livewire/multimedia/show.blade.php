<div>
    <div class="row form-publish mb-5 pb-2">
        <div class="col-md-4">
            <label for="validationComparsa" class="form-label">BANDA</label>
            <select wire:model="filtrocomparsa" class="form-control @error('filtrocomparsa') is-invalid @enderror" id="validationComparsa" aria-describedby="validationComparsaFeedback">
                <option value="0">Todas</option>
                @foreach($comparsas as $com)
                <option value="{{ $com->id }}">{{ $com->name }}</option>
                @endforeach
            </select>
            @error('filtrocomparsa') <div id="validationComparsaFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>
        <div class="col-md-4">
            <label for="validationFormat" class="form-label">FORMATO</label>
            <select wire:model="filtroformat" class="form-control @error('filtroformat') is-invalid @enderror" id="validationFormat" aria-describedby="validationFormatFeedback">
                <option value="0">Todos</option>
                @foreach($formatos as $f)
                <option value="{{ $f }}">{{ $f }}</option>
                @endforeach
            </select>
            @error('filtroformat') <div id="validationFormatFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>
        <div class="col-md-4">
            <label for="validationDate" class="form-label">FECHA</label>
            <select wire:model.lazy="filtrodate" class="form-control @error('filtrodate') is-invalid @enderror" id="validationDate" aria-describedby="validationDateFeedback">
                <option value="0">Todas</option>
                @foreach($fechas as $kf => $f)
                <option value="{{ $kf }}" wire:key="{{$kf}}">{{ $f }}</option>
                @endforeach
            </select>
            @error('filtrodate') <div id="validationDateFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>
    </div>
    <div class="row">
        @forelse($multimedias as $multimedia)
            @include('frontend.multimedia.col-multimedia',['multimedia'=>$multimedia])
        @empty
            <p>No se han encontrado resultados</p>
        @endforelse
    </div>
    @if ($paginate AND $multimedias->count())
        <div class="row">
            <div class="col-md-12 text-center">
                {{ $multimedias->links() }}
            </div>
        </div>
    @endif
</div>

@push('scripts')
@endpush
