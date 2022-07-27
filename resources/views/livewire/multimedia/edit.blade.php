<div>

    <form wire:submit.prevent="submit" class="needs-validation">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="validationComparsa" class="form-label">Comparsa</label>
                            <select wire:model="comparsa" class="form-control @error('comparsa') is-invalid @enderror" id="validationComparsa" aria-describedby="validationComparsaFeedback">
                                <option value="0">Seleccione...</option>
                                @foreach($comparsas as $com)
                                <option value="{{ $com->id }}">{{ $com->name }}</option>
                                @endforeach
                            </select>
                            @error('comparsa') <div id="validationComparsaFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

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

                            @if($imageTemporary)
                                <div class="mb-3">
                                    <label>Visualización previa:</label><br>
                                    <img src="{{ asset('storage/'.$imageTemporary) }}" class="img-fluid" style="max-width: 300px">
                                </div>
                            @else

                            @if ($image AND !$errors->has('image'))
                            <div class="mb-3">
                                <label>Visualización previa:</label><br>
                                <img src="{{ $image->temporaryUrl() }}" class="img-fluid" style="max-width: 300px">
                            </div>
                            @endif

                            @endif

                            <label for="validationImage" class="form-label">Imagen</label>
                            <input wire:model="image" class="form-control @error('image') is-invalid @enderror" type="file" id="validationImage" aria-describedby="validationImageFeedback">
                            @error('image') <div id="validationImageFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                            <div wire:loading wire:target="image">Cargando...</div>

                        </div>

                        <div class="mb-3">
                            <label for="validationFormat" class="form-label">Formato</label>
                            <select wire:model="format" class="form-control @error('format') is-invalid @enderror" id="validationFormat" aria-describedby="validationFormatFeedback">
                                <option value="0">Seleccione...</option>
                                @foreach(config('multimedia.formats') as $f)
                                <option value="{{ $f }}">{{ $f }}</option>
                                @endforeach
                            </select>
                            @error('format') <div id="validationFormatFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        @if ($format == 'PDF')
                            <div class="mb-3 border border-radius p-3">

                                @if ($filePdfTemporary) {!! $multimedia->getFile() !!} <br><br> @endif

                                <label for="validationPdf" class="form-label">Archivo PDF @if ($filePdf AND !$errors->has('filePdf')) <span class="badge badge-info ml-3">Archivo cargado</span> @endif </label>
                                <input wire:model="filePdf" class="form-control @error('filePdf') is-invalid @enderror" type="file" id="validationPdf" aria-describedby="validationPdfFeedback">
                                @error('filePdf') <div id="validationPdfFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                                <div wire:loading wire:target="filePdf">Cargando...</div>
                            </div>
                        @endif

                        @if ($format == 'MP3')
                            <div class="mb-3 border border-radius p-3">

                                @if ($fileMp3Temporary) {!! $multimedia->getFile() !!} <br><br> @endif

                                <label for="validationMp3" class="form-label">Archivo MP3 @if ($fileMp3 AND !$errors->has('fileMp3')) <span class="badge badge-info ml-3">Archivo cargado</span> @endif </label>
                                <input wire:model="fileMp3" class="form-control @error('fileMp3') is-invalid @enderror" type="file" id="validationMp3" aria-describedby="validationMp3Feedback">
                                @error('fileMp3') <div id="validationMp3Feedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                                <div wire:loading wire:target="fileMp3">Cargando...</div>
                            </div>
                        @endif

                        @if ($format == 'VIDEO')
                            <div class="mb-3 border border-radius p-3">

                                @if ($fileVideoTemporary) {!! $multimedia->getFile() !!} <br><br> @endif

                                <label for="validationVideo" class="form-label">Link Youtube</label>
                                <input type="text" wire:model="fileVideo" class="form-control @error('fileVideo') is-invalid @enderror" id="validationVideo" aria-describedby="validationVideoFeedback">
                                @error('fileVideo') <div id="validationVideoFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                            </div>
                        @endif

                        @if ($format == 'IMAGEN')
                            <div class="mb-3 border border-radius p-3">

                                @if ($fileImagen AND !$errors->has('fileImagen'))
                                <div class="mb-3">
                                    <label>Visualización previa:</label><br>
                                    <img src="{{ $fileImagen->temporaryUrl() }}" class="img-fluid" style="max-width: 300px">
                                </div>
                                @else

                                    @if ($fileImagenTemporary)

                                        <div class="mb-3">
                                            <label>Visualización previa:</label><br>
                                            <img src="{{ asset('storage/'.$fileImagenTemporary) }}" class="img-fluid" style="max-width: 300px">
                                        </div>

                                    @endif

                                @endif

                                <label for="validationFileImagen" class="form-label">Archivo imagen</label>
                                <input wire:model="fileImagen" class="form-control @error('fileImagen') is-invalid @enderror" type="file" id="validationFileImagen" aria-describedby="validationFileImagenFeedback">
                                @error('fileImagen') <div id="validationFileImagenFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                                <div wire:loading wire:target="fileImagen">Cargando...</div>

                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="validationLink" class="form-label">Link</label>
                            <input type="text" wire:model="link" class="form-control @error('link') is-invalid @enderror" id="validationLink" aria-describedby="validationLinkFeedback">
                            @error('link') <div id="validationLinkFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <div wire:ignore>
                                <label for="validationDescription" class="form-label">Descripción</label>
                                <textarea wire:model="description" class="form-control" id="validationDescription">{!! $description !!}</textarea>
                            </div>
                            @error('description') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Publicar multimedia</h3>
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

                        @if ($format == 'IMAGEN')
                        <div class="mb-3">
                            <label for="validationSource" class="form-label">Mostrar en galería</label>
                            <select wire:model="gallery" class="form-control @error('gallery') is-invalid @enderror" id="validationSource" aria-describedby="validationSourceFeedback">
                                <option value="1">Sí</option>
                                <option value="0">No</option>
                            </select>
                            @error('gallery') <div id="validationSourceFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="validationSource1" class="form-label">Mostrar en comparsas históricas</label>
                            <select wire:model="gallery_history_ch" class="form-control @error('gallery_history_ch') is-invalid @enderror" id="validationSource1" aria-describedby="validationSource1Feedback">
                                <option value="1">Sí</option>
                                <option value="0">No</option>
                            </select>
                            @error('gallery_history_ch') <div id="validationSource1Feedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="validationSource2" class="form-label">Mostrar en viejos sopladores</label>
                            <select wire:model="gallery_history_vs" class="form-control @error('gallery_history_vs') is-invalid @enderror" id="validationSource2" aria-describedby="validationSource2Feedback">
                                <option value="1">Sí</option>
                                <option value="0">No</option>
                            </select>
                            @error('gallery_history_vs') <div id="validationSource2Feedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>
                        @endif

                        <div class="mt-5">
                            <a href="{{ route('admin.multimedia') }}" class="btn btn-secondary float-left">Volver</a>
                            <button type="submit" class="btn btn-primary float-right">Actualizar</button>
                        </div>

                    </div>
                </div>

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
            .create( document.querySelector( '#validationDescription' ), {
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

                    @this.set('description', editor.getData());

                })
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
