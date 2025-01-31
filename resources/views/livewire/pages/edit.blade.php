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

                            @if($page->route == 'history.comparsashistoricas')

                                <div class="mb-3">
                                    <label for="validationGalleryCh" class="form-label">Cantidad imágenes en galería</label>
                                    <select wire:model="nGalleryHistoryCh" class="form-control @error('nGalleryHistoryCh') is-invalid @enderror" id="validationGalleryCh" aria-describedby="validationGalleryChFeedback">
                                        @for($i=1;$i<=10;$i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('nGalleryHistoryCh') <div id="validationGalleryChFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                                </div>

                            @endif

                            @if($page->route == 'history.viejossopladores')

                                <div class="mb-3">
                                    <label for="validationGalleryVs" class="form-label">Cantidad imágenes en galería</label>
                                    <select wire:model="nGalleryHistoryVs" class="form-control @error('nGalleryHistoryVs') is-invalid @enderror" id="validationGalleryVs" aria-describedby="validationGalleryVsFeedback">
                                        @for($i=1;$i<=10;$i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('nGalleryHistoryVs') <div id="validationGalleryVsFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
                                </div>

                            @endif
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

    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script>

    <script>


        CKEDITOR.ClassicEditor.create(document.getElementById("validationText"), {
            // https://ckeditor.com/docs/ckeditor5/latest/getting-started/setup/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'blockQuote', 'insertTable', 'codeBlock', 'htmlEmbed', '|',
                    'horizontalLine', 'pageBreak', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'Lakitas de Arica',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
                options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            htmlSupport: {
                allow: [
                    {
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }
                ]
            },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            htmlEmbed: {
                showPreviews: false
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            // The "superbuild" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'AIAssistant',
                'CKBox',
                'CKFinder',
                'EasyImage',
                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                // Storing images as Base64 is usually a very bad idea.
                // Replace it on production website with other solutions:
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                // 'Base64UploadAdapter',
                'MultiLevelList',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                'MathType',
                // The following features require additional license.
                'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents',
                'PasteFromOfficeEnhanced',
                'CaseChange'
            ]
        })
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
