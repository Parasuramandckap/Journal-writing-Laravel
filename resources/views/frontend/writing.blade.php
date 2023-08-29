@extends('auth.layouts.front')

@section('title')
    Welcome to our Journals!
@endsection

@section('content')
<div class="ml-56 mt-20">
    <div class="writing-container mt-8">
        <div class="header flex w-11/12 justify-between items-center m-auto rounded-md">
          <div class="calender">
            <p class="text-center text-xl mb-2">Pick your date</p>
            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                  </svg>
                </div>
                <input required id="date" type="text" class="dateTime rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[220px] pl-10 2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white  focus:outline-none border-none dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
              </div>

          </div>
          <div class="container-emojs">
          <p class="text-center text-xl mb-2">How do you feel</p>
            <div class="emojs pl-7 pr-7 pt-2 pb-2 flex gap-5 rounded-md relative">
                <div class="emojsList relative">
                    <p class="emojText absolute top-10" data-tarid="1">Smile</p>
                    <p class="emoj text-lg" data-tarid="1">&#128517;</p>
                </div>
                <div class="emojsList relative">
                    <p class="emojText absolute top-10" data-tarid="2">Love</p>
                    <p class="emoj text-lg" data-tarid="2">&#128525;</p>
                </div>
                <div class="emojsList relative">
                    <p class="emojText absolute top-10" data-tarid="3">Happy</p>
                    <p class="emoj text-lg" data-tarid="3">&#128578;</p>
                </div>
                <div class="emojsList relative">
                    <p class="emojText absolute top-10" data-tarid="4">Cry</p>
                    <p class="emoj text-lg" data-tarid="4">&#128560;</p>
                </div>
                <div class="emojsList relative">
                    <p class="emojText absolute top-10" data-tarid="5">Angry</p>
                    <p class="emoj text-lg" data-tarid="5">&#128545;</p>
                </div>
            </div>
          </div>
        </div>
        <div class="title text-center mt-4 mb-6">
            <input type="text" class="rounded-md userTitle text-center shadow-md border-0 outline-none bg-white" id="userTitle" placeholder="Title....." />
        </div>
        <div class="text-editor w-11/12 m-auto">
          <div class="userInput" id="editor"></div>
          <div class="subBtn pt-5 text-end">
              <button class="pubBtn pl-7 pr-7 pt-2 bg-emerald-600 hover:bg-emerald-800  pb-2 rounded-md">Publish</button>
          </div>
        </div>
    </div>
    </div>
@endsection
