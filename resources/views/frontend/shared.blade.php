@extends('auth.layouts.front')

@section('title')
    Welcome to our Journals!
@endsection

@section('content')
<div class="ml-60 mt-24">
    <div class="carts flex flex-row gap-5 m-auto">
        {{-- {{dd($sharedItems)}} --}}
            @if($sharedItems->count() > 0)
                @foreach ( $sharedItems as $contents )
                <div class="w-80 bg-white border border-gray-200 rounded-lg product"   value="{{$contents->id}}">
                    {{-- <a href="/showContent"> --}}
                        <h5 class="text-center mt-2 mb-2 text-2xl font-medium tracking-tight text-gray-900">
                            {{ $contents->title }}</h5>
                    </a>
                    <p class="h-24 show-view overflow-hidden m-auto text-justify w-64 mb-3 font-normal text-gray-700 dark:text-gray-400 content" id="{{$contents->id}}">
                        {!! Illuminate\Support\str::limit($contents->content, 200) !!}</p>
                    <input type="hidden" class="post_id" value="{{ $contents->id }}">
                    <div class="p-5 flex justify-between relative">
                        <div class="date">
                            <a href="#"
                                class="text-xs inline-flex items-cente,r px-3 py-2 text-sm font-medium text-center text-white bg-emerald-700 rounded-lg hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                              Shared by {{$contents->name}} on {{\Carbon\Carbon::parse($contents->from_date)->format('d/m/Y')}}
                            </a>
                        </div>
                        {{-- <div class="action-btns items-center">
                            @if ($contents->starred)
                                <button title="UnStar"><i class="fa-solid fa-star starred-item star"></i></button>
                            @else
                                <button title="Star"><i class="fa-regular fa-star starred-item unstar"></i></button>
                            @endif
                            <button title="Share" class="block share-action-openClone-btn  text-black share shareBtn" type="button"
                                data-modal-toggle="default-modal">
                                <i class="fa-solid fa-share share" ></i>
                            </button>
                            <button title="More" class="moreBtn notTarget" id="{{ $contents->id }}"><i
                                    class="notTarget fa-solid fa-ellipsis-vertical"></i></button>
                        </div> --}}
                        {{-- <div class="action-more-btns absolute top-20 right-4 bg-white w-24 flex flex-col rounded-md invisible"
                            id="{{ $contents->id }}">
                            <button class="hiddenBtn hover:bg-emerald-800 hover:text-white notTarget edit rounded-t mb-1 flex pl-1.5 gap-x-2 items-center">
                                <i class="fa-solid fa-pen notTarget edit-post-item"></i>
                                <a href="{{ 'editContent/'.$contents->id }}">Edit</a>
                            </button>
                            <button class="hiddenBtn notTarget hover:bg-emerald-800 hover:text-white delete rounded-b flex pl-1.5 gap-x-2 items-center delete-post-item">
                                <i class="fa-solid notTarget fa-trash-can delete-post-item"></i>
                                Delete
                            </button>
                        </div> --}}
                    </div>
                </div>
                @endforeach
            @else
            <div class="w-full h-full flex flex-col justify-center items-center">
                <img src="{{asset('images/welcome/starred.svg')}}" class="mt-44" alt="" srcset="">
                <p class="mt-7">No Shared Items here..</p>
            </div>
            @endif
    </div>
</div>



<div class="blackScreen de-active"></div>
<div class="w-full">
    <div class="view-user-contents de-active w-4/5 absolute pr-4 pl-4 pt-4 pb-4 rounded-lg m-auto">
        <div class="view-content-header flex items-center gap-3/6 justify-end">
            <h1 class="content-title font-bold text-2xl title">My Journal</h1>
            <span class="show-view pt-0.5 pb-0.5 pl-2 pr-2 rounded-md close-btn"><i class="fa-solid fa-xmark"></i></span>
        </div>
        <p class="text-justify mt-5 overflow-scroll max-h-72 overflow-x-auto    overflow-y-auto fullContent">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic voluptatum, repellat dolorem totam tempora expedita odit nulla maxime numquam consequuntur molestias suscipit quaerat iusto, minima eum nesciunt ab, alias dignissimos veritatis. Distinctio tempora assumenda quam reiciendis non quasi! Nisi blanditiis adipisci ipsum ex, molestiae pariatur, minus animi vel consequuntur illo similique, rem accusantium magni unde omnis delectus quis fuga. Adipisci, nisi, minus nostrum atque minima earum ab illo saepe dolorum obcaecati dolore enim maiores. Saepe consequuntur earum inventore, maiores esse alias quasi perspiciatis culpa, vitae doloremque, odio et. Enim accusantium non sapiente ad quis aliquid sit numquam nobis cum rerum
        </p>
    </div>
</div>


@endsection
