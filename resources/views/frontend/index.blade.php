@extends('auth.layouts.front')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- datatable css link -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <!-- jquery cdn link -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <!-- tailwind css -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css"> -->
    <style>
        #selectable-1 .ui-selected {
            background: #1f4636;
            color: white;
        }

        .active {

            background: #27634a !important;
            color: rgb(241, 236, 236);
        }

        .dataTables_wrapper {
            width: 95%;
            margin: auto
        }


        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
        }

        table th {
            background: #04AA6D;
            color: white;
        }

        table tr {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: .35em;
        }

        table th,
        table td {
            padding: .625em;
        }

        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
            text-align: left;
        }


        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #04AA6D !important;
            color: white !important;
            border: none !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: #04AA6D !important;
            color: white !important;
            padding: 0.5em 1em;

        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border: none !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #04AA6D;
            color: white !important;
        }

        .dataTables_wrapper .dataTables_length select {
            outline: none;
            border: 1px solid #aaa;
            border-radius: 3px;
            padding: 5px;
            background-color: transparent;
            color: inherit;
            padding: 4px;
        }


        .dataTables_wrapper .dataTables_length {
            padding: 10px;
        }

        .dataTables_wrapper .dataTables_filter {
            padding: 10px;

        }

        .dataTables_wrapper .dataTables_length select {
            outline: none;
            border: 1px solid #aaa;
            border-radius: 3px;
            padding: 5px;
            background-color: transparent;
            color: inherit;
            padding-right: 20px;
        }

        .dataTables_wrapper .dataTables_filter input {
            outline: none;
        }
    </style>
</head>
@section('title')
    Welcome to our Journals!
@endsection

@section('content')
    {{-- header actions --}}
    <main class="mt-16 ml-52">
        <div class="container text-center mx-auto p-4 justify-end">
            <div class="flex justify-end rounded-lg text-lg" role="group">
                {{-- <p
                    class="bg-white view-btn cursor-pointer text-grey-500 hover:bg-emerald-800 hover:text-white border border-r-0 rounded-l-lg px-4 py-2 mx-0 outline-none focus:shadow-outline">
                    <i class="fa-solid fa-calendar-days"></i></p> --}}

                <p
                   id="hide" class="bg-white cursor-pointer view-btn ui-selected rounded-l-lg text-grey-500 hover:bg-emerald-800 hover:text-white border  px-4 py-2 mx-0 outline-none focus:shadow-outline {{ Request::is('/') ? 'active' : '' }}">
                    <i class="fa-solid fa-table-cells"></i>
                </p>

                <p id="btn2"
                    class="bg-white view-btn cursor-pointer text-grey-500 hover:bg-emerald-800 hover:text-white border border-l-0 rounded-r-lg px-4 py-2 mx-0 outline-none focus:shadow-outline">
                    <i class="fa-solid fa-bars "></i></p>
            </div>


        </div>
    </main>

    <div class="flex flex-row ml-60 grid">
        <div class="carts flex flex-row w-full items-center gap-5">
            @if ($contents->count() > 0)
                <div class="w-80 bg-white h-56 w-80 rounded-md flex flex-col items-center justify-evenly">
                    <a href="/writing"><img src="{{ asset('images/welcome/Group.svg') }}" class="h-28" /></a>
                    <h3>Add New Journal</h3>
                </div>
                @foreach ($contents as $content)
                    <div class="w-80 bg-white border border-gray-200 rounded-lg product" value="{{ $content->id }}">
                        {{-- <a href="/showContent"> --}}
                            {{-- <div> --}}
                                <h5 class="text-center mt-2 mb-2 text-2xl font-medium tracking-tight text-gray-900">
                                    {{ $content->title }}</h5>
                                </a>
                                <p class="h-24 show-view overflow-hidden m-auto text-justify w-64 mb-3 font-normal text-gray-700 dark:text-gray-400 content"
                                    id="{{ $content->id }}">
                                    {!! Illuminate\Support\str::limit($content->content, 200) !!}</p>
                            {{-- </div> --}}
                        <input type="hidden" class="post_id" value="{{ $content->id }}">
                        <div class="p-5 flex justify-between relative">
                            <div class="date">
                                <a href="#"
                                    class="text-xs inline-flex items-cente,r px-3 py-2 text-sm font-medium text-center text-white bg-emerald-700 rounded-lg hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    @if($content->from_date && $content->end_date)
                                    {{ \Carbon\Carbon::parse($content->from_date)->format('jS M') }} - {{ \Carbon\Carbon::parse($content->end_date)->format('jS M') }}
                                    @elseif($content->from_date)
                                    {{ \Carbon\Carbon::parse($content->from_date)->format('jS M') }}
                                    @elseif($content->end_date)
                                    {{ \Carbon\Carbon::parse($content->end_date)->format('jS M') }}
                                    @else
                                     No dates
                                    @endif

                                </a>
                            </div>
                            <div class="action-btns items-center">
                                {{-- @php
                                    // dump($content->starred == "1");
                                    $class = $content->starred == '1' ? 'fa-solid fa-star starred-item unstar' : 'fa-regular fa-star starred-item star';
                                    // dump($class);
                                @endphp
                                <button id="{{ 'start-' . $content->id }}" title="UnStar"><i
                                        class="{{ $class }}"></i></button> --}}
                                @if ($content->starred)
                                    <button title="UnStar"><i class="fa-solid fa-star starred-item star"></i></button>
                                @else
                                    <button title="Star"><i class="fa-regular fa-star starred-item unstar"></i></button>
                                @endif

                                <button title="Share" class="block share-action-openClone-btn  text-black share shareBtn"
                                    type="button" data-modal-toggle="default-modal">
                                    <i class="fa-solid fa-share share"></i>
                                </button>
                                <button title="More" class="moreBtn notTarget" id="{{ $content->id }}"><i
                                        class="notTarget fa-solid fa-ellipsis-vertical"></i></button>
                            </div>
                            <div class="action-more-btns absolute top-20 right-4 bg-white w-24 flex flex-col rounded-md invisible"
                                id="{{ $content->id }}">
                                <button
                                    class="hiddenBtn hover:bg-emerald-800 hover:text-white notTarget edit rounded-t mb-1 flex pl-1.5 gap-x-2 items-center">
                                    <i class="fa-solid fa-pen notTarget edit-post-item"></i>
                                    <a href="{{ 'editContent/' . $content->id }}">Edit</a>
                                </button>
                                <button
                                    class="hiddenBtn notTarget hover:bg-emerald-800 hover:text-white delete rounded-b flex pl-1.5 gap-x-2 items-center delete-post-item">
                                    <i class="fa-solid notTarget fa-trash-can delete-post-item"></i>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="share-tab invisible">
                    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                        <div class="fixed inset-0 z-10 overflow-y-auto">
                            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                <div
                                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                    <div class="containers px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                        <div class="header pb-1">
                                            <p class="greeting text-2xl">Share Your Journal</p>
                                        </div>
                                        <div class="search-mail mt-4">
                                            <p class="mb-4">Enter the shared Email</p>
                                            <p class="emailExists text-green-500"></p>
                                            <p class="emailnotExists text-rose-500"></p>
                                            <div class="relative w-full flex justify-between">
                                                <input type="text" class="search-mail w-full rounded-lg sendEmail"
                                                    placeholder="Add People" name="sendEmail" />
                                                {{-- <button
                                                        class="search-btn rounded-lg pt-2 pb-2 pl-6 pr-6">Search</button> --}}
                                            </div>
                                        </div>
                                        {{-- <div
                                                class="users mt-5 flex justify-between h-48 overflow-x-auto overflow-y-auto">
                                                <div class="user flex gap-3 mb-4">
                                                    <div class="img">
                                                        <img class="w-10 h-10 rounded-full"
                                                            src="https://igimages.gumlet.io/tamil/gallery/actress/trisha/trisha30122022_006.jpg?w=600&dpr=1.0"
                                                            alt="Rounded avatar">
                                                    </div>
                                                    <div class="user-details">
                                                        <p class="user-name">Jeeva S</p>
                                                        <p class="user-email">jeevasdckap@gmail.com</p>
                                                    </div>
                                                </div>
                                                <div class="select-auth">
                                                    <select id="small"
                                                        class="selectAuth block w-20 p-2 mb-6 bg-transparent border-0">
                                                        <option selected>view</option>
                                                        <option value="US">Comment</option>
                                                        <option value="CA">view</option>
                                                        <option value="FR">Remove</option>
                                                    </select>
                                                </div>
                                            </div> --}}
                                        <div class="footer mt-3">
                                            <div class="footer-head flex items-baseline justify-between">
                                                <div class="info">
                                                    <p>Anyone with link can edit</p>
                                                </div>
                                                <select id="small"
                                                    class="selectAuth block w-20 p-2 mb-6 bg-transparent border-0">
                                                    <option selected>view</option>
                                                    <option value="US">Comment</option>
                                                    <option value="CA">view</option>
                                                    <option value="FR">Remove</option>
                                                </select>
                                            </div>
                                            <div class="footer-foot flex justify-between items-center">
                                                <p class="copyLink flex gap-3"><span><i
                                                            class="fa-solid fa-link"></i></span>Copy Link</p>
                                                <div class="action-btns share-action-openClone-btn flex gap-5">
                                                    <button
                                                        class="close-btn btn-color bg-emerald-700 pt-2 pb-2 pl-4 pr-4 rounded-md">Cancel</button>
                                                    <button
                                                        class="close-btn btn-color pt-2 bg-emerald-700 share-action-openClone-btn  pb-2 pl-4 pr-4 rounded-md sendBtn shareBtn">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </div>

        {{-- view content tab --}}

        <div class="blackScreen de-active"></div>
        <div tabindex="-1" class="fixed view-user-contents de-active top-0 left-0 right-0 z-50  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-gray-300">
            <div class="relative w-full max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative flex justify-between bg-white shadow dark:bg-gray-700 w-full">
                    <!-- Modal header -->
                    <div class="view-containers p-5 dark:border-gray-600 w-4/5">
                        <h3 class="text-xl ml-10 font-medium text-gray-900 dark:text-white title">

                        </h3>
                        <div class="p-6 space-y-6 w-11/12">
                            <p class="text-base h-full overflow-scroll overflow-x-hidden overflow-y-hidden leading-relaxed text-gray-500 dark:text-gray-400 fullContent">
                            </p>
                        </div>

                    </div>
                    <!-- Modal body -->
                    <div class="flex flex-col">
                        <button type="button" class="close-view mt-2.5 mr-2.5 text-gray-400 bg-transparent hover:bg-red-800 hover:text-white rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="extralarge-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                       <div class="emptyLine ml-80"></div>
                        <div class="map-view p-6 border-gray-600">
                            <img src="{{ asset('images/welcome/Frame 8493.svg') }}" h-72 w-60/>
                            <div class="details flex flex-col gap-5 mt-5">

                            <div class="location flex gap-3">
                                <div>
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div>
                                    <p>Location</p>
                                    <p>Anna Nagar, Chennai</p>
                                </div>
                            </div>
                            <div class="location flex gap-3">
                                <div>
                                    <i class="fa-regular fa-clock"></i>
                                </div>
                                <div>
                                    <p>Data/Time</p>
                                    <p>11.10 AM GMT +05:30, Sat, Aug 05,2023</p>
                                </div>
                            </div>
                            <div class="location flex gap-3">
                                <div>
                                    <i class="fa-regular fa-calendar-days"></i>
                                </div>
                                <div>
                                    <p>On this day, Aug 05</p>
                                    <p>1 Entry, 0 Photos, 1year</p>
                                </div>
                            </div>
                            <div class="location flex gap-3">
                                <div>
                                    <i class="fa-regular fa-calendar-days"></i>
                                </div>
                                <div>
                                    <p>On this day,  WednesdayAug 05</p>
                                    <p>1 Entry, 0 Photos, 1year </p>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="flex bg-white items-center justify-between p-6 space-x-2">
                    <div class="action-btns">
                        <button data-modal-hide="extralarge-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                        <button data-modal-hide="extralarge-modal" type="button" class="text-white bg-red-700 hover:bg-red-950 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Trash</button>
                    </div>
                    <div class="expBtn">
                        <button data-modal-hide="extralarge-modal" type="button" class="text-white bg-red-700 hover:bg-red-950 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" id="downloadBtn">Export</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>

   // Your JavaScript code here

   $(document).ready(function () {

           let btn =document.querySelectorAll("#downloadBtn")



           btn.forEach(btn=>{
               btn.addEventListener("click",(e)=>{
                           // Create a new jsPDF instance
            let a = e.target.parentElement.parentElement.firstChild.innerHTML;

            // console.log(a);

            var doc = new jsPDF();

            // Add content to PDF
            doc.fromHTML(a, 10, 10, {
                'width': 180
            });

            // Save the PDF
            doc.save('converted.pdf');
               })
           })
       });

   </script> --}}




    <div class=" ml-60 mt-0 list" style="display: none">
        <div class="m-auto">
            <div>
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Star</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contents as $key => $content)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $content->title }}</td>
                                <td>{!! Illuminate\Support\str::limit($content->content,50) !!}</td>
                                <td>
                                    @if ($content->starred)
                                        <button title="UnStar"><i class="fa-solid fa-star starred-item star"></i></button>
                                    @else
                                        <button title="Star"><i
                                                class="fa-regular fa-star starred-item unstar"></i></button>
                                    @endif
                                </td>
                                <td>
                                    <button class="close-btn btn-color bg-emerald-700 pt-2 pb-2 pl-4 pr-4 rounded-md"
                                        id="{{ $content->id }}">Edit</button>
                                    <button
                                        class="close-btn btn-color bg-red-700 pt-2 pb-2 pl-4 pr-4 rounded-md delete-post-item"
                                        id="{{ $content->id }}">Delete</button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>

    <!-- datatable js link -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <!-- tailwind css -->
    <!-- <script src="https://cdn.tailwindcss.com/3.3.3"></script> -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    {{-- <script src="./pp.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>

    <script>
        $('#myTable').DataTable();
    </script>
@else
    <div class=" mt-28 m-auto">
        <a href="/writing"><img src="{{ asset('images/welcome/first.svg') }}" alt="" srcset=""></a>
        <p class="mt-7">Write Your first Jorunal here</p>
    </div>
    @endif


@endsection
