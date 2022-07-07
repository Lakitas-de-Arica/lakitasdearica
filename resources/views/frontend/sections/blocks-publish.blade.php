<div class="container-fluid mb-5">
    <div class="container py-5">
        <div class="row g-0">
            <div class="col-lg-3 block-form d-none d-md-block" style="background-image: url('{{ asset('images/registra-comparsa.jpg') }}');"></div>
            <div class="col-lg-3 block-form pt-5 px-4 pb-4 bg-purple">
                <h2>
                    Registra tu Comparsa
                </h2>
                <div class="row">
                    <div class="col-8">
                        <a href="{{ route('comparsa.publish') }}">IR AL FORMULARIO</a>
                    </div>
                    <div class="col-4 text-end">
                        <a href="{{ route('comparsa.publish') }}">
                            <img src="{{ asset('images/arrow-right-white.svg') }}" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 block-form d-none d-md-block" style="background-image: url('{{ asset('images/publica-noticia.jpg') }}');"></div>
            <div class="col-lg-3 block-form pt-5 px-4 pb-4 bg-blue">
                <h2>
                    Publica tu Noticia
                </h2>
                <div class="row">
                    <div class="col-8">
                        <a href="{{ route('news.publish') }}">IR AL FORMULARIO</a>
                    </div>
                    <div class="col-4 text-end">
                        <a href="{{ route('news.publish') }}">
                            <img src="{{ asset('images/arrow-right-white.svg') }}" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
