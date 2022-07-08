<div>

    <form wire:submit.prevent="submit" class="needs-validation form-publish">
        <div class="card card-body p-5">

            <div class="mb-3">
                <label for="validationTitle" class="form-label">Título</label>
                <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" id="validationTitle" aria-describedby="validationTitleFeedback">
                @error('title') <div id="validationTitleFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>

            <div class="mb-3">
                <label for="validationDate" class="form-label">Fecha</label>
                <input type="text" wire:model="date" class="form-control @error('date') is-invalid @enderror" id="validationDate" aria-describedby="validationDateFeedback">
                @error('date') <div id="validationDateFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>

            <div class="mb-3">
                <label for="validationText" class="form-label">Texto</label>
                <textarea wire:model="text" class="form-control @error('text') is-invalid @enderror" id="validationText" aria-describedby="validationTextFeedback"></textarea>
                @error('text') <div id="validationTextFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>

            <div class="mb-3">

                @if ($image)
                <div class="mb-3">
                    <label>Visualización previa:</label><br>
                    <img src="{{ $image->temporaryUrl() }}" class="img-fluid">
                </div>
                @endif

                <label for="validationImage" class="form-label">Adjuntar imágen</label>
                <input wire:model="image" class="form-control @error('image') is-invalid @enderror" type="file" id="validationImage" aria-describedby="validationImageFeedback">
                @error('image') <div id="validationImageFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                <div wire:loading wire:target="image">Cargando...</div>
            </div>

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

            @if (session()->has('captcha'))
                <div class="alert alert-danger">
                    {{ session('captcha') }}
                </div>
            @endif
            <div wire:ignore>
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display(['data-callback' => 'onCallback']) !!}
            </div>

            @error('recaptcha') <span class="text-danger"> {{ $message }} </span> @enderror
        </div>
        <div class="text-center mt-5">
            <button type="submit" class="btn btn-primary">Enviar noticia</button>
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
