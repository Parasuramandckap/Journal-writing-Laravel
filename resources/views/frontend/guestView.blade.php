<!DOCTYPE html>
<html lang="en">
<head>
    <title>Show Content</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/bfbec30b4e.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="extralarge-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-gray-300">
        <div class="relative w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 w-2/3">
                <!-- Modal header -->
               @foreach ($contents as $content )
                <div class="   flex justify-between  p-5 rounded-t dark:border-gray-600">
                    <h3 class="text-xl ml-10 font-medium text-gray-900 dark:text-white">
                    {{$content->title}}
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-red-800 hover:text-white rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="extralarge-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="flex justify-between">
                    <div class="p-6 space-y-6">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                           {{$content->content}}</p>
                    </div>
                    @endforeach
                   <div class="emptyLine"></div>
                    <div class="map-view p-6 border-gray-600 m-auto w-1/2	">
                        <img src="{{asset('images/welcome/Frame 8493.svg')}}" h-72 w-60/>
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
                <!-- Modal footer -->
                <div class="flex items-center justify-between p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <div class="action-btns">
                        <a href="/register" class="bg-emerald-600 hover:bg-emerald-800"><p>New to Journal Create an Account!</p></a>
                        <a href="/login" class="bg-emerald-600 hover:bg-emerald-800"><p>Already have an account? Login!</p></a>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>
</html>
