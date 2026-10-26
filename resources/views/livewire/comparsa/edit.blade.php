<div>

    <form wire:submit.prevent="submit" class="needs-validation">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="validationName" class="form-label">Nombre</label>
                            <input type="text" wire:model.live="name" class="form-control @error('name') is-invalid @enderror" id="validationName" aria-describedby="validationNameFeedback">
                            @error('name') <div id="validationNameFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="validationDate" class="form-label">Fecha formación</label>
                            <input type="text" wire:model.live="date" class="form-control @error('date') is-invalid @enderror datepicker" id="validationDate" aria-describedby="validationDateFeedback">
                            @error('date') <div id="validationDateFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">

                            @if ($image)
                            <div class="mb-3">
                                <label>Visualización previa:</label><br>
                                <img src="{{ $image->temporaryUrl() }}" class="img-fluid" style="max-width: 300px">
                            </div>
                            @else

                                @if ($current_image)

                                    <div class="mb-3">
                                        <label>Visualización previa:</label><br>
                                        <img src="{{ asset('storage/'.$current_image) }}" class="img-fluid" style="max-width: 300px">
                                    </div>

                                @endif

                            @endif

                            <label for="validationImage" class="form-label">Actualizar imagen</label>
                            <input wire:model.live="image" class="form-control @error('image') is-invalid @enderror" type="file" id="validationImage" aria-describedby="validationImageFeedback">
                            @error('image') <div id="validationImageFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                            <div wire:loading wire:target="image">Cargando...</div>
                        </div>

                        <div class="mb-3">
                            <label for="validationLocation" class="form-label">Localidad o barrio pertenencia</label>
                            <input type="text" wire:model.live="location" class="form-control @error('location') is-invalid @enderror" id="validationLocation" aria-describedby="validationLocationFeedback">
                            @error('location') <div id="validationLocationFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="validationMembers" class="form-label">Integrantes (separados por comas)</label>
                            <input type="text" wire:model.live="members" class="form-control @error('members') is-invalid @enderror" id="validationMembers" aria-describedby="validationMembersFeedback">
                            @error('members') <div id="validationMembersFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <div wire:ignore>
                                <label for="validationExtract" class="form-label">Extracto</label>
                                <textarea wire:model.live="extract" class="form-control" id="validationExtract">{!! $extract !!}</textarea>
                            </div>
                            @error('extract') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                        </div>

                        <div class="mb-3">
                            <div wire:ignore>
                                <label for="validationText" class="form-label">Texto público</label>
                                <textarea wire:model.live="text" class="form-control" id="validationText">{!! $text !!}</textarea>
                            </div>
                            @error('text') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                        </div>

                        @if($source_form)

                            <div class="border-top w-100 mb-3 mt-5"></div>

                            <div class="mb-3">
                                <label for="validationText1" class="form-label">¿Cuando, como y porque se formó la comparsa?</label>
                                <textarea wire:model.live="text_1" class="form-control" id="validationText1">{!! $text_1 !!}</textarea>
                            </div>
                            @error('text_1') <div class="text-danger"><small>{{ $message }}</small></div> @enderror

                            <div class="mb-3">
                                <label for="validationText2" class="form-label">
                                    ¿Cual es la trayectoria musical de los principales fundadores de la comparsa?
                                </label>
                                <textarea wire:model.live="text_2" class="form-control" id="validationText2">{!! $text_2 !!}</textarea>
                                @error('text_2') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="validationText3" class="form-label">
                                    ¿Cual es el sello o la idea musical que inspira a la comparsa?. ¿Que los hace diferentes a las demás?
                                </label>
                                <textarea wire:model.live="text_3" class="form-control" id="validationText3">{!! $text_3 !!}</textarea>
                                @error('text_3') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="validationText4" class="form-label">
                                    ¿Cual es el estilo musical y repertorio que mejor define a la comparsa?. ¿Cual es la idea detrás del repertorio que seleccionaron para el disco?
                                </label>
                                <textarea wire:model.live="text_4" class="form-control" id="validationText4">{!! $text_4 !!}</textarea>
                                @error('text_4') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="validationText5" class="form-label">
                                    ¿Dónde tocan o por qué escenarios musicales se mueven más (pueblos del interior arica o iquique, urbano, qué tipo de eventos)?
                                </label>
                                <textarea wire:model.live="text_5" class="form-control" id="validationText5">{!! $text_5 !!}</textarea>
                                @error('text_5') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="validationLink" class="form-label">
                                    Material AV: Link al material de la comparsa en el Archivo Multimedia
                                </label>
                                <input type="text" wire:model.live="link" class="form-control @error('link') is-invalid @enderror" id="validationLink" aria-describedby="validationLinkFeedback">
                                @error('link') <div id="validationLinkFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
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

                        <div class="mb-3">
                            <label for="validationPublish" class="form-label">Publicado</label>
                            <select wire:model.live="publish" class="form-control @error('publish') is-invalid @enderror" id="validationPublish" aria-describedby="validationPublishFeedback">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                            @error('publish') <div id="validationPublishFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="validationSource" class="form-label">Fuente</label>
                            <select wire:model.live="source_form" class="form-control @error('source_form') is-invalid @enderror" id="validationSource" aria-describedby="validationSourceFeedback">
                                <option value="0">Publicación interna</option>
                                <option value="1">Desde formulario web</option>
                            </select>
                            @error('source_form') <div id="validationSourceFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mt-5">
                            <a href="{{ $urlPrevious }}" class="btn btn-secondary float-left">Volver</a>
                            <button type="submit" class="btn btn-primary float-right">Actualizar</button>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Contacto</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="validationContactName" class="form-label">Nombre del contacto</label>
                            <input type="text" wire:model.live="contact_name" class="form-control @error('contact_name') is-invalid @enderror" id="validationContactName" aria-describedby="validationContactNameFeedback">
                            @error('contact_name') <div id="validationContactNameFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="validationContactEmail" class="form-label">Email</label>
                            <input type="text" wire:model.live="contact_email" class="form-control @error('contact_email') is-invalid @enderror" id="validationContactEmail" aria-describedby="validationContactEmailFeedback">
                            @error('contact_email') <div id="validationContactEmailFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="validationContactPhone" class="form-label">Teléfono</label>
                            <input type="text" wire:model.live="contact_phone" class="form-control @error('contact_phone') is-invalid @enderror" id="validationContactPhone" aria-describedby="validationContactPhoneFeedback">
                            @error('contact_phone') <div id="validationContactPhoneFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="validationContactPhone" class="form-label">Link web</label>
                            <input type="text" wire:model.live="web" class="form-control @error('web') is-invalid @enderror" id="validationContactPhone" aria-describedby="validationWebFeedback">
                            @error('web') <div id="validationWebFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="validationContactPhone" class="form-label">Link Facebook</label>
                            <input type="text" wire:model.live="facebook" class="form-control @error('facebook') is-invalid @enderror" id="validationContactPhone" aria-describedby="validationFacebookFeedback">
                            @error('facebook') <div id="validationFacebookFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="validationContactPhone" class="form-label">Link Instagram</label>
                            <input type="text" wire:model.live="instagram" class="form-control @error('instagram') is-invalid @enderror" id="validationContactPhone" aria-describedby="validationInstagramFeedback">
                            @error('instagram') <div id="validationInstagramFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="validationText6" class="form-label">
                                Otros
                            </label>
                            <textarea wire:model.live="text_6" class="form-control" id="validationText6">{!! $text_6 !!}</textarea>
                            @error('text_6') <div class="text-danger"><small>{{ $message }}</small></div> @enderror
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
            .create( document.querySelector( '#validationText' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                    ]
                },
                height: 400
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
