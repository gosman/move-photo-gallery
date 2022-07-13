@extends('shopify-app::layouts.default')

@section('content')

    <div class="mt-2 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-3">
            <div class="col-span-2">
                <h1 class="text-xl font-semibold text-move-500">Submissions</h1>
            </div>
            <div class="col-span-1">
                <div class="mt-1">
                    <input type="text" name="name" id="name" class="shadow-sm focus:ring-move-500 focus:border-move-500 block w-full sm:text-sm border-gray-300 px-4 rounded-full" placeholder="Search">
                </div>
            </div>
        </div>

        <div>
            <div class="sm:hidden mt-2">
                <select id="tabs" name="tabs" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-move-500 focus:border-move-500 sm:text-sm rounded-md">
                    <option>New Submissions</option>
                    <option>Approved</option>
                </select>
            </div>
            <div class="hidden sm:block">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <a href="/" class="app-link border-move-500 text-move-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" aria-current="page">New Submissions</a>
                        <a href="/gallery-admin/approved" class="app-link border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Approved</a>
                    </nav>
                </div>
            </div>
        </div>


        <div class="mt-4 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-move-500 sm:pl-6">Submitter</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-move-500">Vehicle</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-move-500">Bumper</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-move-500">Image Status</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">

                            @foreach($submissions as $submission)
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="w-20" src="{{config('filesystems.disks.images.cdn')}}{{$submission->images[0]->image_name}}" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900">{{$submission->name}}</div>
                                                <div class="text-gray-500">{{$submission->email}}</div>
                                                <div class="text-gray-500">{{$submission->images->count()}} Images</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <div class="text-gray-900">{{$submission->make}} {{$submission->model}}</div>
                                        <div class="text-gray-500">{{$submission->year}} | {{$submission->engine_type}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$submission->bumper_position}} {{$submission->bumper_type}} </td>

                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if($submission->images->where('approved',1)->count() > 0)
                                            <span class="inline-flex rounded-full bg-yellow-500 px-2 text-xs font-semibold leading-5 text-white">{{$submission->images->where('approved',1)->count()}} Approved</span>
                                        @else
                                            <span class="inline-flex rounded-full bg-red-500 px-2 text-xs font-semibold leading-5 text-white">Unapproved</span>
                                        @endif
                                    </td>

                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="/gallery-admin/{{$submission->id}}/edit" class="app-link text-move-500 hover:text-move-900">Edit</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{ $submissions->links() }}
    </div>

@endsection

@section('scripts')
    @parent
    <script>
        actions.TitleBar.create(app, { title: 'Gallery Submissions' });
    </script>
@endsection
