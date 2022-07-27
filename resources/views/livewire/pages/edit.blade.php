<div>

    <form wire:submit.prevent="submit" class="needs-validation">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="validationTitle" class="form-label">Título</label>
                            <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" id="validationTitle" aria-describedby="validationTitleFeedback" disabled>
                            @error('title') <div id="validationTitleFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <div wire:ignore>
                                <label for="validationText" class="form-label">Texto</label>
                                <textarea wire:model="text" class="form-control" id="validationText">{!! $text !!}</textarea>
                            </div>
                            @error('text') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                        </div>

                        @if($gallery !== 0)
                        <div class="mb-3">
                            <label for="validationGallery" class="form-label">Mostrar galería</label>
                            <select wire:model="gallery" class="form-control @error('gallery') is-invalid @enderror" id="validationGallery" aria-describedby="validationGalleryFeedback">
                                <option value="1">Si</option>
                                <option value="2">No</option>
                            </select>
                            @error('gallery') <div id="validationGalleryFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Actualizar</h3>
                    </div>
                    <div class="card-body">

                        <div class="">
                            <a href="{{ route('admin.pages') }}" class="btn btn-secondary float-left">Volver</a>
                            <button type="submit" class="btn btn-primary float-right">Actualizar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </form>

</div>

@push('js')

    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#validationText' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                    ]
                }
            } )
            .then( editor => {
                editor.model.document.on('change:data', () => {

                    @this.set('text', editor.getData());

                })
            } )
            .catch( error => {
                console.error( error );
            } );

    </script>
@endpush
