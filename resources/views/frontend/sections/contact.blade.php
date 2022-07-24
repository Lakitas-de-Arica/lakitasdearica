@extends('layout.master')

@section('title_1', 'Lakitas de Arica')
@section('title_2', 'Créditos, Contacto, Links')

@section('pre_css')
@endsection

@section('css')

@endsection

@section('content')

<div class="container-fluid mt-md-5 mt-0">
    <div class="container py-5">
        <div class="row pt-5 pb-3 justify-content-center">
            <div class="col-md-4 text-start col-title-section">
                <p>CRËDITOS Y LINKS</p>
                <h2 class="mb-5">CONTACTO</h2>
            </div>
            <div class="col-md-6">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis facilisis tortor, aliquet dictum
                    tellus. Cras sit amet egestas sapien. Cras elementum euismod dictum. Nulla facilisi. Integer vitae
                    mauris eu arcu consectetur eleifend. Pellentesque a eleifend nisl, id tincidunt nisl. Proin non velit
                    quis augue commodo vestibulum. Phasellus at rutrum nisi. Vivamus porta ut ligula vitae interdum.
                </p>
                <p>
                    <b>Vivamus porta ut ligula vitae interdum</b><br>
                    <b>Phasellus at rutrum nisi</b><br>
                    <b>Elementum euismod dictum</b>
                </p>
                <p>
                    Nullam nibh augue, maximus id aliquet a, convallis in orci. Aliquam nec egestas felis. Vestibulum tellus
                    nisi, suscipit ac tortor ut, ultrices cursus tortor. In odio sem, ultricies at libero id, consectetur
                    semper odio. Vestibulum rutrum, est ac blandit dignissim, odio orci faucibus nibh, et dapibus velit mi
                    sed leo.
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                @livewire('multimedia.gallery')
            </div>
        </div>
    </div>
</div>

@stop

@section('pre_js')
@endsection

@section('js')

    @stack('scripts')
@endsection
