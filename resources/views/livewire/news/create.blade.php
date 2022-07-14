<div>

    <form wire:submit.prevent="submit" class="needs-validation">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="validationTitle" class="form-label">Título</label>
                            <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" id="validationTitle" aria-describedby="validationTitleFeedback">
                            @error('title') <div id="validationTitleFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="validationDate" class="form-label">Fecha</label>
                            <input type="text" wire:model="date" class="form-control @error('date') is-invalid @enderror datepicker" id="validationDate" aria-describedby="validationDateFeedback">
                            @error('date') <div id="validationDateFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">

                            @if ($image)
                            <div class="mb-3">
                                <label>Visualización previa:</label><br>
                                <img src="{{ $image->temporaryUrl() }}" class="img-fluid" style="max-width: 300px">
                            </div>
                            @endif

                            <label for="validationImage" class="form-label">Actualizar imagen</label>
                            <input wire:model="image" class="form-control @error('image') is-invalid @enderror" type="file" id="validationImage" aria-describedby="validationImageFeedback">
                            @error('image') <div id="validationImageFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                            <div wire:loading wire:target="image">Cargando...</div>
                        </div>

                        <div class="mb-3">
                            <div wire:ignore>
                                <label for="validationIntroduction" class="form-label">Introducción</label>
                                <textarea wire:model="introduction" class="form-control" id="validationIntroduction">{!! $introduction !!}</textarea>
                            </div>
                            @error('introduction') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                        </div>

                        <div class="mb-3">
                            <div wire:ignore>
                                <label for="validationText" class="form-label">Texto</label>
                                <textarea wire:model="text" class="form-control" id="validationText">{!! $text !!}</textarea>
                            </div>
                            @error('text') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Publicar noticia</h3>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="validationPublish" class="form-label">Publicado</label>
                            <select wire:model="publish" class="form-control @error('publish') is-invalid @enderror" id="validationPublish" aria-describedby="validationPublishFeedback">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                            @error('publish') <div id="validationPublishFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="validationSource" class="form-label">Fuente</label>
                            <select wire:model="source_form" wire:change="updateSource" class="form-control @error('source_form') is-invalid @enderror" id="validationSource" aria-describedby="validationSourceFeedback">
                                <option value="1">Desde formulario web</option>
                                <option value="0">Publicación interna</option>
                            </select>
                            @error('source_form') <div id="validationSourceFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>


                        <div class="mt-5">
                            <a href="{{ route('admin.news') }}" class="btn btn-secondary float-left">Volver</a>
                            <button type="submit" class="btn btn-primary float-right">Guardar cambios</button>
                        </div>

                    </div>
                </div>

                @if($source_form)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Contacto</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="validationLink" class="form-label">Link</label>
                            <input type="text" wire:model="link" class="form-control @error('link') is-invalid @enderror" id="validationLink" aria-describedby="validationLinkFeedback">
                            @error('link') <div id="validationLinkFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="validationContactName" class="form-label">Nombre del contacto</label>
                            <input type="text" wire:model="contact_name" class="form-control @error('contact_name') is-invalid @enderror" id="validationContactName" aria-describedby="validationContactNameFeedback">
                            @error('contact_name') <div id="validationContactNameFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="validationContactEmail" class="form-label">Email</label>
                            <input type="text" wire:model="contact_email" class="form-control @error('contact_email') is-invalid @enderror" id="validationContactEmail" aria-describedby="validationContactEmailFeedback">
                            @error('contact_email') <div id="validationContactEmailFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="validationContactPhone" class="form-label">Teléfono</label>
                            <input type="text" wire:model="contact_phone" class="form-control @error('contact_phone') is-invalid @enderror" id="validationContactPhone" aria-describedby="validationContactPhoneFeedback">
                            @error('contact_phone') <div id="validationContactPhoneFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>

    </form>

</div>

@push('js')

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

    <script>
        $(".datepicker").flatpickr({
            dateFormat: "Y-m-d",
            locale: "es",
            defaultDate: "{{ $date }}"
        });

        ClassicEditor
            .create( document.querySelector( '#validationIntroduction' ), {
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

                    @this.set('introduction', editor.getData());

                })
            } )
            .catch( error => {
                console.error( error );
            } );

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
