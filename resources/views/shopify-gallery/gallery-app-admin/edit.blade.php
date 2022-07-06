@extends('shopify-app::layouts.default')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8">

        <div class="mt-4 flex flex-col">
            <form class="space-y-8 divide-y divide-gray-200">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">

                    <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-move-500">{{$submission->make}} {{$submission->model}} | {{$submission->year}}</h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Use a permanent address where you can receive mail.</p>
                        </div>
                        <div class="space-y-6 sm:space-y-5">
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="first-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> First name </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="max-w-lg block w-full shadow-sm focus:ring-move-500 focus:border-move-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="last-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Last name </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="max-w-lg block w-full shadow-sm focus:ring-move-500 focus:border-move-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Email address </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input id="email" name="email" type="email" autocomplete="email" class="block max-w-lg w-full shadow-sm focus:ring-move-500 focus:border-move-500 sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Country </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <select id="country" name="country" autocomplete="country-name" class="max-w-lg block focus:ring-move-500 focus:border-move-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                        <option>United States</option>
                                        <option>Canada</option>
                                        <option>Mexico</option>
                                    </select>
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="street-address" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Street address </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="block max-w-lg w-full shadow-sm focus:ring-move-500 focus:border-move-500 sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="city" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> City </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="city" id="city" autocomplete="address-level2" class="max-w-lg block w-full shadow-sm focus:ring-move-500 focus:border-move-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="region" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> State / Province </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="region" id="region" autocomplete="address-level1" class="max-w-lg block w-full shadow-sm focus:ring-move-500 focus:border-move-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="postal-code" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> ZIP / Postal code </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="max-w-lg block w-full shadow-sm focus:ring-move-500 focus:border-move-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="divide-y divide-gray-200 pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Notifications</h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">We'll always let you know about important changes, but you pick what else you want to hear about.</p>
                        </div>
                        <div class="space-y-6 sm:space-y-5 divide-y divide-gray-200">
                            <div class="pt-6 sm:pt-5">
                                <div role="group" aria-labelledby="label-email">
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                        <div>
                                            <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700" id="label-email">By Email</div>
                                        </div>
                                        <div class="mt-4 sm:mt-0 sm:col-span-2">
                                            <div class="max-w-lg space-y-4">
                                                <div class="relative flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="comments" name="comments" type="checkbox" class="focus:ring-move-500 h-4 w-4 text-move-600 border-gray-300 rounded">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="comments" class="font-medium text-gray-700">Comments</label>
                                                        <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="relative flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="candidates" name="candidates" type="checkbox" class="focus:ring-move-500 h-4 w-4 text-move-600 border-gray-300 rounded">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="candidates" class="font-medium text-gray-700">Candidates</label>
                                                            <p class="text-gray-500">Get notified when a candidate applies for a job.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="relative flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="offers" name="offers" type="checkbox" class="focus:ring-move-500 h-4 w-4 text-move-600 border-gray-300 rounded">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="offers" class="font-medium text-gray-700">Offers</label>
                                                            <p class="text-gray-500">Get notified when a candidate accepts or rejects an offer.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-6 sm:pt-5">
                                <div role="group" aria-labelledby="label-notifications">
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                        <div>
                                            <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700" id="label-notifications">Push Notifications</div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <div class="max-w-lg">
                                                <p class="text-sm text-gray-500">These are delivered via SMS to your mobile phone.</p>
                                                <div class="mt-4 space-y-4">
                                                    <div class="flex items-center">
                                                        <input id="push-everything" name="push-notifications" type="radio" class="focus:ring-move-500 h-4 w-4 text-move-600 border-gray-300">
                                                        <label for="push-everything" class="ml-3 block text-sm font-medium text-gray-700"> Everything </label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input id="push-email" name="push-notifications" type="radio" class="focus:ring-move-500 h-4 w-4 text-move-600 border-gray-300">
                                                        <label for="push-email" class="ml-3 block text-sm font-medium text-gray-700"> Same as email </label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input id="push-nothing" name="push-notifications" type="radio" class="focus:ring-move-500 h-4 w-4 text-move-600 border-gray-300">
                                                        <label for="push-nothing" class="ml-3 block text-sm font-medium text-gray-700"> No push notifications </label>
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

                <div class="pt-5">
                    <div class="flex justify-end">
                        <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-move-500">Cancel</button>
                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-move-600 hover:bg-move-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-move-500">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    @parent
    <script>
        actions.TitleBar.create(app, { title: 'Edit Submission' });
    </script>
@endsection