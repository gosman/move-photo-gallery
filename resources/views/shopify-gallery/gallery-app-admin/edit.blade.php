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


                        <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2">

                            @foreach($submission->images as $image)

                                <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
                                    <div class="flex-1 flex flex-col p-8">
                                        <img class="h-32 flex-shrink-0 mx-auto" src="{{config('filesystems.disks.images.cdn')}}{{$image->image_name}}" alt="">
                                    </div>
                                    <div>
                                        <div class="-mt-px flex divide-x divide-gray-200">
                                            <div class="w-0 flex-1 flex">
                                                <a href="mailto:janecooper@example.com" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                                    <!-- Heroicon name: solid/mail -->
                                                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                                    </svg>
                                                    <span class="ml-3">Email</span>
                                                </a>
                                            </div>
                                            <div class="-ml-px w-0 flex-1 flex">
                                                <a href="tel:+1-202-555-0170" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                                    <!-- Heroicon name: solid/phone -->
                                                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                                    </svg>
                                                    <span class="ml-3">Call</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>


                        <div class="space-y-6 sm:space-y-5">
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="first-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Name</label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="name" value="{{$submission->name}}" class="max-w-lg block w-full shadow-sm focus:ring-move-500 focus:border-move-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Email address </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input name="email" type="email" value="{{$submission->email}}" class="max-w-lg block w-full shadow-sm focus:ring-move-500 focus:border-move-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Instagram Handle </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input name="instagram" type="text" value="{{$submission->instagram}}" class="max-w-lg block w-full shadow-sm focus:ring-move-500 focus:border-move-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="make" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Make </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <select data-selected="{{$submission->make}}" id="truckMake" name="make" class="max-w-lg block focus:ring-move-500 focus:border-move-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"></select>
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="model" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Model </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <select data-selected="{{$submission->model}}" id="truckModel" name="model" class="max-w-lg block focus:ring-move-500 focus:border-move-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"></select>
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="year" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Year </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <select data-selected="{{$submission->year}}" id="truckYear" name="year" class="max-w-lg block focus:ring-move-500 focus:border-move-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"></select>
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="engine_type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Engine Type </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <select name="engine_type" class="max-w-lg block focus:ring-move-500 focus:border-move-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                        <option @if($submission->engine_type ==="Diesel") selected @endif value="Diesel">Diesel</option>
                                        <option @if($submission->engine_type ==="Gas") selected @endif value="Gas">Gas</option>
                                    </select>
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="bumper_position" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Bumper Position </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <select name="bumper_position" class="max-w-lg block focus:ring-move-500 focus:border-move-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                        <option @if($submission->bumper_position ==="Front") selected @endif value="Front">Front</option>
                                        <option @if($submission->bumper_position ==="Rear") selected @endif value="Rear">Rear</option>
                                    </select>
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="bumper_type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Bumper Type </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
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

                        </div>
                    </div>
                </div>

                <div class="pt-5">
                    <div class="flex justify-start">
                        <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-move-500">Cancel</button>
                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-move-600 hover:bg-move-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-move-500">Save</button>
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
