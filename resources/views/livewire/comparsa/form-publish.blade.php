<div>

    <form wire:submit.prevent="submit" class="needs-validation form-publish">
        <div class="card card-body p-3 p-md-5">

            <h4 class="mb-4">Información general</h4>

            <div class="mb-3">
                <label for="validationName" class="form-label">Nombre agrupación</label>
                <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="validationName" aria-describedby="validationNameFeedback">
                @error('name') <div id="validationNameFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>

            <div class="mb-3">
                <label for="validationDate" class="form-label">Fecha formación</label>
                <input type="text" wire:model="date" class="form-control @error('date') is-invalid @enderror" id="validationDate" aria-describedby="validationDateFeedback">
                @error('date') <div id="validationDateFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>

            <div class="mb-3">
                <label for="validationLocation" class="form-label">Localidad o barrio pertenencia</label>
                <input type="text" wire:model="location" class="form-control @error('location') is-invalid @enderror" id="validationLocation" aria-describedby="validationLocationFeedback">
                @error('location') <div id="validationLocationFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>

            <div class="mb-3">
                <label for="validationMembers" class="form-label">Integrantes</label>
                <input type="text" wire:model="members" class="form-control @error('members') is-invalid @enderror" id="validationMembers" aria-describedby="validationMembersFeedback">
                @error('members') <div id="validationMembersFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>

            <div class="mb-3">
                <label for="validationLink" class="form-label">Material AV: Link al material de la comparsa en el Archivo Multimedia</label>
                <input type="text" wire:model="link" class="form-control @error('link') is-invalid @enderror" id="validationLink" aria-describedby="validationLinkFeedback">
                @error('link') <div id="validationLinkFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>

            <div class="mb-3">
                <label for="validationText1" class="form-label">¿Cuando, como y porque se formó la comparsa?</label>
                <textarea wire:model="text_1" rows="5" class="form-control @error('text_1') is-invalid @enderror" id="validationText1" aria-describedby="validationText1Feedback"></textarea>
                @error('text_1') <div id="validationText1Feedback" class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>

            <div class="mb-3">
                <label for="validationText2" class="form-label">¿Cual es la trayectoria musical de los principales fundadores de la comparsa?</label>
                <textarea wire:model="text_2" rows="5" class="form-control @error('text_2') is-invalid @enderror" id="validationText2" aria-describedby="validationText2Feedback"></textarea>
                @error('text_2') <div id="validationText2Feedback" class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>

            <div class="mb-3">
                <label for="validationText3" class="form-label">¿Cual es el sello o la idea musical que inspira a la comparsa?. ¿Que los hace diferentes a las demás?</label>
                <textarea wire:model="text_3" rows="5" class="form-control @error('text_3') is-invalid @enderror" id="validationText3" aria-describedby="validationText3Feedback"></textarea>
                @error('text_3') <div id="validationText3Feedback" class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>

            <div class="mb-3">
                <label for="validationText4" class="form-label">¿Cual es el estilo musical y repertorio que mejor define a la comparsa?. ¿Cual es la idea detrás del repertorio que seleccionaron para el disco?</label>
                <textarea wire:model="text_4" rows="5" class="form-control @error('text_4') is-invalid @enderror" id="validationText4" aria-describedby="validationText4Feedback"></textarea>
                @error('text_4') <div id="validationText4Feedback" class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>

            <div class="mb-3">
                <label for="validationText5" class="form-label">¿Dónde tocan o por qué escenarios musicales se mueven más (pueblos del interior arica o iquique, urbano, qué tipo de eventos)?</label>
                <textarea wire:model="text_5" rows="5" class="form-control @error('text_5') is-invalid @enderror" id="validationText5" aria-describedby="validationText5Feedback"></textarea>
                @error('text_5') <div id="validationText5Feedback" class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>

            <h4 class="mb-4 mt-5">CONTACTO</h4>

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

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="validationWeb" class="form-label">Página web</label>
                    <input type="text" wire:model="web" class="form-control @error('web') is-invalid @enderror" id="validationWeb" aria-describedby="validationWebFeedback">
                    @error('web') <div id="validationWebFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationFacebook" class="form-label">Facebook</label>
                    <input type="text" wire:model="facebook" class="form-control @error('facebook') is-invalid @enderror" id="validationFacebook" aria-describedby="validationFacebookFeedback">
                    @error('facebook') <div id="validationFacebookFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationInstagram" class="form-label">Instagram</label>
                    <input type="text" wire:model="instagram" class="form-control @error('instagram') is-invalid @enderror" id="validationInstagram" aria-describedby="validationInstagramFeedback">
                    @error('instagram') <div id="validationInstagramFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="validationText6" class="form-label">Otros</label>
                <textarea wire:model="text_6" rows="5" class="form-control @error('text_6') is-invalid @enderror" id="validationText6" aria-describedby="validationText6Feedback"></textarea>
                @error('text_6') <div id="validationText6Feedback" class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>

            <div wire:ignore>
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display(['data-callback' => 'onCallback']) !!}
            </div>

            @error('recaptcha') <span class="text-danger"> {{ $message }} </span> @enderror
        </div>
        <div class="text-center mt-5">
            <button type="submit" class="btn btn-primary">ENVIAR REGISTRO</button>
        </div>
    </form>

</div>

@push('scripts')
    <script>
        var onCallback = function() {
            @this.recaptcha = grecaptcha.getResponse()
        };

        Livewire.on('resetReCaptcha', () => {
            grecaptcha.reset();
        });
    </script>
@endpush
