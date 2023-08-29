<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
 <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
 <script src="https://cdn.tailwindcss.com"></script>
 <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css" rel="stylesheet" />
 <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<script src="https://kit.fontawesome.com/122ac14709.js"crossorigin="anonymous"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

<link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css">
<link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.core.css">
<script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


<style>
    .flatpickr-day:hover {
        background: #489f78;
        color: white;
    }

    .flatpickr-day.today:hover {
        background: #489f78;
        color: white;
    }

    .flatpickr-day.today {
        border: 1px solid #489f78;
    }

    .flatpickr-day.selected.startRange, .flatpickr-day.startRange.startRange, .flatpickr-day.endRange.startRange
    {
        background: #489f78;
        -webkit-box-shadow: none;
        box-shadow: none;
        color: #fff;
        border-color: #489f78;
    }
    .flatpickr-day.selected.startRange, .flatpickr-day.startRange.startRange, .flatpickr-day.endRange.endRange
    {
        background: #489f78;
        -webkit-box-shadow: none;
        box-shadow: none;
        color: #fff;
        border-color: #489f78;
    }
    .url{
        background-color: #489f78 !important;
    }


</style>
</head>

<body>
      @include('auth.layouts.inc.sidebar')
    <div class="main">
       @include('auth.layouts.inc.frontnav')
      @yield('content')
    </div>
    <script src="{{ asset('frontend/js/jquery-3.7.0.min.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
          var availableTags = [];

          $.ajax({
            method: 'GET',
            url: '/journal-list',
            success: function (response) {
                startAutoComplete(response)
            }
        })
         function startAutoComplete(availableTags){
          $( "#tags" ).autocomplete({
            source: availableTags
          })
        };
    </script>


    <script src="{{ asset('frontend/js/custom.js') }}" defer></script>
    <script src="{{ asset('frontend/js/tailwind.config.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    @if (session('status'))
        <script>
            // swal("{{ session('status') }}");
            let timerInterval
                Swal.fire({
                title: 'Welcome to the DCKAP Journals',
                html: 'I will close in <b></b> milliseconds.',
                timer: 1500,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
                })
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        {{-- <!-- datatable js link -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
        <!-- tailwind css -->
        <!-- <script src="https://cdn.tailwindcss.com/3.3.3"></script> -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="./pp.js"></script> --}}
        {{-- <script type="module">
            import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
        </script>
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script> --}}
</body>
</html>
