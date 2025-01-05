@extends('admin.master')
@section('title')
    {{ 'Read Ordered Book' }}
@endsection
@section('content')
<style>
    #pdfContainer {
        overflow-y: scroll;
        height: 600px;
        width: 100%;
        background: #f4f4f4;
        padding: 10px;
    }

    canvas {
        display: block;
        margin: 0 auto;
    }
</style>

<section class="content">
    <div class="container-fluid" style="padding-top: 20px;">
        <div class="row">
            <div class="col-sm-12">
                <h4>
                    <a href="{{ url('admin/view-ordered-book') }}" class="btn btn-primary">Back</a>
                </h4>
                <div id="pdfContainer">
                    <!-- Pages will be appended dynamically here -->
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
<script>
    const pdfUrl = "{{ route('books.secure-pdf', $book->id) }}?v={{ time() }}";
    const pdfjsLib = window['pdfjs-dist/build/pdf'];

    // Set PDF.js worker source
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';

    const container = document.getElementById('pdfContainer');

    // Load the PDF document
    pdfjsLib.getDocument(pdfUrl).promise.then(function (pdf) {
        for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
            renderPage(pdf, pageNum);
        }
    }).catch(function (error) {
        console.error('Error loading PDF:', error);
    });

    function renderPage(pdf, pageNum) {
        pdf.getPage(pageNum).then(function (page) {
            const viewport = page.getViewport({ scale: 1.5 });

            // Create a canvas element for the page
            const canvas = document.createElement('canvas');
            canvas.style.marginBottom = '20px';
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // Append the canvas to the container
            container.appendChild(canvas);

            const context = canvas.getContext('2d');

            // Render the page
            const renderContext = {
                canvasContext: context,
                viewport: viewport,
            };

            page.render(renderContext);
        });
    }
</script>
@endsection
