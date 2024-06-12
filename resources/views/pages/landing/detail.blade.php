@extends('layouts.front')

@section('title', 'Detail')

@section('content')

    <div>
        <!-- breadcrumb -->
        <nav class="mx-8 mt-8 text-sm lg:mx-20" aria-label="Breadcrumb">
            <ol class="inline-flex p-0 list-none">
                <li class="flex items-center">
                    <a href="#" class="text-gray-400">Programming & Tech</a>
                    <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                    </svg>
                </li>
                <li class="flex items-center">
                    <a href="#" class="font-medium">Website Developer</a>
                </li>
            </ol>
        </nav>

        <!-- details -->
        <section class="px-4 pt-6 pb-20 mx-auto w-auth lg:mx-12">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="p-4 lg:col-span-8 md:col-span-12">
                    <!-- details heading -->
                    <div class="details-heading">
                        <h1 class="text-2xl font-semibold"> {{$service->title ?? ''}} </h1>
                        <div class="my-3">
                            @include('component.landing.rating')
                        </div>
                    </div>
                    <div class="p-3 my-4 bg-gray-100 rounded-lg image-gallery" x-data="gallery()">

                        <img :src="featured" alt="" class="rounded-lg cursor-pointer w-100" data-lity>

                        <div class="flex overflow-x-scroll hide-scroll-bar dragscroll">
                            @forelse ($thumbnail as $item)
                            <img :class="{ 'border-4 border-serv-button' : active === {{ $item->id }} }" onclick="changeThumbnail('{{ url(Storage::url($item->thumbnail)) }}', {{ $item->id }})" src="{{ url(Storage::url($item->thumbnail)) }}" alt="thumbnail service" class="inline-block mr-2 rounded-lg cursor-pointer h-20 w-36 object-cover inline-block w-24 mr-2 rounded-lg cursor-pointer">
                        @empty
                            <p>No thumbnails available</p>
                        @endforelse
                        
                        </div>
                    </div>
                    <div class="content">
                        <div x-data="{ tab: window.location.hash ? window.location.hash.substring(1) : 'description' }" id="tab_wrapper">
                            <!-- The tabs navigation -->
                            <nav class="my-8" aria-label="navigation">
                                <a class="inline-block px-8 py-2 my-2 mr-2 font-medium rounded-xl" :class="{ 'bg-serv-bg text-white': tab === 'description', 'bg-serv-services-bg text-serv-bg' : tab !== 'description' }" @click.prevent="tab = 'description'; window.location.hash = 'description'" href="#">Description</a>
                                <a class="inline-block px-8 py-2 my-2 mr-2 font-medium rounded-xl" :class="{ 'bg-serv-bg text-white': tab === 'seller', 'bg-serv-services-bg text-serv-bg' : tab !== 'seller' }" @click.prevent="tab = 'seller'; window.location.hash = 'seller'" href="#">About The Seller</a>
                                <a class="inline-block px-8 py-2 my-2 mr-2 font-medium rounded-xl" :class="{ 'bg-serv-bg text-white': tab === 'reviews', 'bg-serv-services-bg text-serv-bg' : tab !== 'reviews' }" @click.prevent="tab = 'reviews'; window.location.hash = 'reviews'" href="#">Reviews</a>
                            </nav>

                            <!-- The tabs content -->
                            <div x-show.transition.duration.500ms="tab === 'description'" class="leading-8 text-md">
                                <h2 class="text-xl font-semibold">About This <span class="text-serv-button">Service</span></h2>
                                <div class="mt-4 mb-8 content-description">
                                    <p>
                                       {{ $service->description ?? '' }}
                                    </p>
                                </div>
                                <h3 class="my-4 text-lg font-semibold">Why choose my Service?</h3>
                                <ul class="mb-4 list-check">
                                    @forelse ($advantage_service as $advantage_service_item) 
                                        <li class="pl-10 my-2">{{$advantage_service_item->advantage ?? ''}}</li>
                                    @empty
                                        <li class="pl-10 my-2">No advantages listed</li>
                                    @endforelse
                                </ul>
                                <p class="mb-4">
                                    {{$service->note ?? ''}}
                                </p>
                                <p class="mb-4 font-medium">
                                    Contact me to get started!
                                </p>
                            </div>
                            <div x-show.transition.duration.500ms="tab === 'seller'" class="leading-8 text-md">
                                <h2 class="mb-4 text-xl font-semibold">About <span class="text-serv-button">Me</span></h2>
                                <div class="grid md:grid-cols-12">
                                    <div class="flex items-center col-span-12 p-2 lg:col-span-6">
                                        <div class="flex items-center space-x-4">
                                            @if($service->user->detail_user->photo)
                                                <img src="{{ url(Storage::url($service->user->detail_user->photo)) }}" alt="My profile" class="w-20 h-20 object-cover rounded-full" loading="lazy">
                                            @else
                                                <svg class="w-20 h-20 object-cover rounded-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                            @endif
                                        </div>
                                        <div class="flex-grow p-4 -mt-8 leading-8 lg:mt-0">
                                            <div class="text-lg font-semibold text-gray-700">
                                                {{$service->user->name ?? ''}}
                                            </div>
                                            <div class="text-gray-400">
                                                Bandung, Indonesia
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items-center col-span-12 p-2 lg:col-span-6">
                                        <div class="ml-24 -mt-10 lg:my-6 lg:text-right">
                                            @include('component.landing.review')
                                        </div>
                                    </div>
                                </div>
                                <h3 class="my-4 text-lg font-semibold">Biography</h3>
                                <div class="mt-4 mb-8 content-description">
                                    <p>
                                        {{ $service->user->detail_user->biography ?? ''}}
                                    </p>
                                </div>
                                <h3 class="my-4 text-lg font-semibold">My Experiences</h3>
                                <ul class="mb-8 list-check">
                                    @forelse($advantage_user as $advantage_user_item)
                                        <li class="pl-10 my-2">{{$advantage_user_item->advantage ?? ''}}</li>
                                    @empty
                                        <li class="pl-10 my-2">No experiences listed</li>
                                    @endforelse
                                </ul>
                                <h3 class="my-4 text-lg font-semibold">Skills</h3>
                                <div class="mb-8 skills">
                                    @forelse ($tagline as $tagline_item)
                                        <li class="pl-10 my-2"> {{$tagline_item->tagline ?? ''}}</li>
                                    @empty
                                        <li class="pl-10 my-2">No skills listed</li>
                                    @endforelse
                                </div>
                                <hr class="border-serv-services-bg">
                                <p class="my-4 text-lg text-gray-400">
                                    Joined Since {{date("d F Y" ,strtotime($service->created_at) ?? '')}}
                                </p>
                            </div>
                            <div x-show.transition.duration.500ms="tab === 'reviews'">
                                <h2 class="mb-4 text-xl font-semibold"><span class="text-serv-button">210</span> Happy Clients</h2>
                                @include('component.landing.review')
                                @include('component.landing.review')
                                @include('component.landing.review')
                            </div>
                        </div>
                    </div>
                </main>

                <aside class="p-4 lg:col-span-4 md:col-span-12 md:pt-0">
                    <div class="mb-4 border rounded-lg border-serv-testimonial-border">
                        <!-- Profile and delivery information -->
                        <div class="flex items-start px-4 pt-6">
                            @if($service->user->detail_user->photo)
                                <img src="{{ url(Storage::url($service->user->detail_user->photo)) }}" alt="My profile" class="object-cover w-16 h-16 mr-4 rounded-full" loading="lazy">
                            @else
                                <svg class="object-cover w-16 h-16 mr-4 rounded-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            @endif
                            <div class="w-full">
                                <div class="flex items-center justify-between">
                                    <h2 class="my-1 text-xl font-medium text-serv-bg">{{$service->user->name ?? ''}}</h2>
                                </div>
                                <p class="text-md text-serv-text">
                                    {{$service->user->detail_user->role ?? ''}}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center px-2 py-3 mx-4 mt-4 border rounded-full border-serv-testimonial-border">
                            <div class="flex-1 text-sm font-medium text-center">
                                <svg class="inline" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="8" stroke="#082431" stroke-width="1.5" />
                                    <path d="M12 7V12L15 13.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                {{ $service->delivery_time ?? ''}} Days Delivery
                            </div>
                            <div class="flex-1 text-sm font-medium text-center">
                                <svg class="inline" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="24" height="24" fill="white" />
                                    <path d="M19 13C19 15 19 18.5 14.6552 18.5C9.63448 18.5 6.12644 18.5 5 18.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M4 11.5C4 9.5 4 6 8.34483 6C13.3655 6 16.8736 6 18 6" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M7 21.5L4.14142 18.6414C4.06332 18.5633 4.06332 18.4367 4.14142 18.3586L7 15.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M16 3L18.8586 5.85858C18.9367 5.93668 18.9367 6.06332 18.8586 6.14142L16 9" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                {{ $service->revision_limit ?? ''}} Revision Limit
                            </div>
                        </div>
                        <div class="px-4 pt-4 pb-2 features-list">
                            <ul class="mb-4 text-sm list-check">
                                <li class="pl-10 my-4">3 Pages</li>
                                <li class="pl-10 my-4">Customized Design</li>
                                <li class="pl-10 my-4">Responsive Design</li>
                                <li class="pl-10 my-4">3 Plugins/Extensions</li>
                                <li class="pl-10 my-4">E-Commerce Functionality</li>
                            </ul>
                        </div>
                        <div class="px-4">
                            <table class="w-full mb-4">
                                <tr>
                                    <td class="text-sm leading-7 text-serv-text">
                                        Price starts from:
                                    </td>
                                    <td class="mb-4 text-xl font-semibold text-right text-serv-button">
                                        {{'Rp. ' . number_format($service->price) ?? ''}}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="px-4 pb-4 booking">
                            @auth
                                <a href="{{ route('booking.landing', $service->id) }}" class="block px-12 py-4 my-2 text-lg font-semibold text-center text-white bg-serv-button rounded-xl">
                                    Booking Now
                                </a>
                            @endauth

                            @guest
                                <a onclick="toggleModal('loginModal')" class="block px-12 py-4 my-2 text-lg font-semibold text-center text-white bg-serv-button rounded-xl">
                                    Booking Now
                                </a>
                            @endguest
                        </div>
                    </div>
                </aside>
            </div>
        </section>
        <div class="pt-6 pb-20 mx-8 lg:mx-20"></div>
    </div>

@endsection

@push('after-js')
    <script>
        function gallery() {
            return {
                featured: 'https://plus.unsplash.com/premium_photo-1679758629450-30d2263efca5?q=80&w=1527&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                active: 1,
                changeThumbnail: function(url, position) {
                    this.featured = url;
                    this.active = position;
                }
            }
        }
    </script>
@endpush
