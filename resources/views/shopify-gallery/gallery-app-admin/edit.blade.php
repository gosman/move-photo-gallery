@extends('shopify-app::layouts.default')

@section('content')


    <div class="px-4 sm:px-6 lg:px-8">


        @foreach($submission->images as $image)
            <img class="inline-block" style="max-height:150px; width:auto;" src="{{config('filesystems.disks.images.cdn')}}{{$image->image_name}}"/>
        @endforeach


        <div class="flex flex-col">
            <form class="space-y-8 divide-y divide-gray-200">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">

                    <div class="space-y-6 sm:pt-6 sm:space-y-5">
                        <div>
                            <h3 class="text-2xl leading-6 font-medium text-move-500">{{$submission->make}} {{$submission->model}} </h3>
                        </div>


                        <div class="mt-8 flex flex-col">
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-fit py-2 align-middle md:px-6 lg:px-8">
                                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                        <table class="min-w-fit divide-y divide-gray-300">
                                            <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                                    <div class="flex items-center">
                                                        <div class="h-10 w-10 flex-shrink-0">
                                                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="font-medium text-gray-900">Lindsay Walton</div>
                                                            <div class="text-gray-500">lindsay.walton@example.com</div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, Lindsay Walton</span></a>
                                                </td>
                                            </tr>

                                            <!-- More people... -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


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
