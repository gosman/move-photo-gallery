@extends('shopify-app::layouts.default')

@section('content')


    <div class="px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col">
            <form class="space-y-8 divide-y divide-gray-200">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">

                    <div class="space-y-6 sm:pt-6 sm:space-y-5">
                        <div>
                            <h3 class="text-2xl leading-6 font-medium text-move-500">{{$submission->make}} {{$submission->model}} </h3>
                        </div>


                        <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                            @foreach($submission->images as $image)

                                <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
                                    <div class="flex-1 flex flex-col p-8">
                                        <img class="h-32 flex-shrink-0 mx-auto cursor-pointer" src="{{config('filesystems.disks.images.cdn')}}{{$image->image_name}}" alt="">
                                        <dl class="mt-1 flex-grow flex flex-col justify-between">
                                            @if($image->approved)
                                                <dd class="mt-3">
                                                    <span class="px-2 py-1 text-gray-600 text-xs font-medium bg-green-100 rounded-full">Approved</span>
                                                </dd>
                                            @else
                                                <dd class="mt-3">
                                                    <span class="px-2 py-1 text-gray-600 text-xs font-medium bg-red-100 rounded-full">Unapproved</span>
                                                </dd>
                                            @endif
                                        </dl>
                                    </div>
                                    <div>
                                        <div class="-mt-px flex divide-x divide-gray-200">
                                            <div class="w-0 flex-1 flex">
                                                <a href="#" data-id="{{$image->id}}" class="image-delete relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    <span class="ml-3">Delete</span>
                                                </a>
                                            </div>
                                            <div class="-ml-px w-0 flex-1 flex">

                                                @if($image->approved)
                                                    <a href="#" data-id="{{$image->id}}" class="image-unapprove relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                        <span class="ml-3">Unapprove</span>
                                                    </a>
                                                @else
                                                    <a href="#" data-id="{{$image->id}}" class="image-approve relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-move-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                                        </svg>
                                                        <span class="ml-3">Approve</span>
                                                    </a>
                                                @endif


                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>


                        <div class="space-y-6 sm:space-y-5">
                            <div class="sm:grid sm:grid-cols-4 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="first-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Name</label>
                                <div class="mt-1 sm:mt-0 sm:col-span-1">
                                    <input type="text" name="name" value="{{$submission->name}}" class="max-w-lg block w-full shadow-sm focus:ring-move-500 focus:border-move-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-4 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Email address </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-1">
                                    <input name="email" type="email" value="{{$submission->email}}" class="max-w-lg block w-full shadow-sm focus:ring-move-500 focus:border-move-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-4 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Instagram Handle </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-1">
                                    <input name="instagram" type="text" value="{{$submission->instagram}}" class="max-w-lg block w-full shadow-sm focus:ring-move-500 focus:border-move-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-4 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="make" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Make/Model/Year </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-1">
                                    <select data-selected="{{$submission->make}}" id="truckMake" name="make" class="max-w-lg block focus:ring-move-500 focus:border-move-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"></select>
                                </div>
                                <div class="mt-1 sm:mt-0 sm:col-span-1">
                                    <select data-selected="{{$submission->model}}" id="truckModel" name="model" class="max-w-lg block focus:ring-move-500 focus:border-move-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"></select>
                                </div>
                                <div class="mt-1 sm:mt-0 sm:col-span-1">
                                    <select data-selected="{{$submission->year}}" id="truckYear" name="year" class="max-w-lg block focus:ring-move-500 focus:border-move-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"></select>
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-4 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="bumper_position" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Bumper Configuration </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-1">
                                    <select name="bumper_position" class="max-w-lg block focus:ring-move-500 focus:border-move-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                        <option @if($submission->bumper_position ==="Front") selected @endif value="Front">Front</option>
                                        <option @if($submission->bumper_position ==="Rear") selected @endif value="Rear">Rear</option>
                                    </select>
                                </div>
                                <div class="mt-1 sm:mt-0 sm:col-span-1">
                                    <select name="bumper_type" class="max-w-lg block focus:ring-move-500 focus:border-move-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                        <option @if($submission->bumper_type ==="Series Classic") selected @endif value="Series Classic">Series Classic</option>
                                        <option @if($submission->bumper_type ==="Series Precision") selected @endif value="Series Precision">Series Precision</option>
                                        <option @if($submission->bumper_type ==="Series Embark") selected @endif value="Series Embark">Series Embark</option>
                                        <option @if($submission->bumper_type ==="Series Bolt") selected @endif value="Series Bolt">Series Bolt</option>
                                        <option @if($submission->bumper_type ==="Series Moab") selected @endif value="Series Moab">Series Moab</option>
                                        <option @if($submission->bumper_type ==="Series Trail") selected @endif value="Series Trail">Series Trail</option>
                                        <option @if($submission->bumper_type ==="Series Overland") selected @endif value="Series Overland">Series Overland</option>
                                        <option @if($submission->bumper_type ==="Series Heritage") selected @endif value="Series Heritage">Series Heritage</option>
                                        <option @if($submission->bumper_type ==="Series Switchback") selected @endif value="Series Switchback">Series Switchback</option>
                                    </select>
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-4 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="engine_type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Engine Type </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-1">
                                    <select name="engine_type" class="max-w-lg block focus:ring-move-500 focus:border-move-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                        <option @if($submission->engine_type ==="Diesel") selected @endif value="Diesel">Diesel</option>
                                        <option @if($submission->engine_type ==="Gas") selected @endif value="Gas">Gas</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="pt-5">
                    <div class="flex justify-start">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-move-600 hover:bg-move-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-move-500">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <input id="makeModelYear" type="hidden" value='{!! json_encode($makeModelYear) !!}'>

@endsection

@section('scripts')
    @parent
    <script>
        actions.TitleBar.create(app, { title: 'Edit Submission' });
    </script>
@endsection
