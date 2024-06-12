@extends('layouts.app')

@section('title', 'Detail Order')

@section('content')
<main class="h-full overflow-y-auto">
    <div class="container mx-auto">
        <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
            <div class="col-span-8">
                <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                    My Services
                </h2>
                <p class="text-sm text-gray-400">
                    {{auth()->user()->order_freelance()->count()}}  Total Services
                </p>
            </div>
            <div class="col-span-4 lg:text-right">
                <div class="relative mt-0 md:mt-6">
                    <button class="px-4 py-2 mt-2 text-left text-white bg-red-400 rounded-xl">
                        Delete Service
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb -->
    <nav class="mx-10 mt-8 text-sm" aria-label="Breadcrumb">
        <ol class="inline-flex p-0 list-none">
            <li class="flex items-center">
                <a href="{{route('member.service.index')}}" class="text-gray-400">My Services</a>
                <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                </svg>
            </li>
            <li class="flex items-center">
                <p class="font-medium">Details Service</p>
            </li>
        </ol>
    </nav>

    <section class="container px-6 mx-auto mt-5">
        <div class="grid gap-5 md:grid-cols-12">
            <main class="col-span-12 p-4 md:pt-0">
                <div class="bg-white rounded-xl">
                    <section class="pt-6 pb-20 mx-8 w-auth">
                        <div class="grid gap-5 md:grid-cols-12">
                            <main class="p-4 lg:col-span-7 md:col-span-12">
                                <span class="inline-flex items-center justify-center px-3 py-2 mb-4 mr-2 text-xs leading-none text-green-500 rounded-full bg-serv-green-badge">Active</span>

                                <!-- details heading -->
                                <div class="details-heading">
                                    <h1 class="text-2xl font-semibold">{{$order->service->title ?? ''}}</h1>
                                    <div class="my-3">
                                       @include('component.dashboard.rating')
                                    </div>
                                </div>
                                <div class="p-3 my-4 bg-gray-100 rounded-lg image-gallery" x-data="gallery()">
                                    <img :src="featured" alt="" class="rounded-lg cursor-pointer w-100" data-lity>
                                    <div class="flex overflow-x-scroll hide-scroll-bar dragscroll">
                                        <div class="flex mt-2 flex-nowrap">

                                        @forelse ($thumbnail as $item)
                                            <img :class="{ 'border-4 border-serv-button' : active === {{ $item->id }} }" onclick="changeThumbnail('{{ url(Storage::url($item->thumbnail)) }}', {{ $item->id }})" src="{{ url(Storage::url($item->thumbnail)) }}" alt="thumbnail service" class="inline-block mr-2 rounded-lg cursor-pointer h-20 w-36 object-cover inline-block w-24 mr-2 rounded-lg cursor-pointer">
                                        @empty
                                            <p>No thumbnails available</p>
                                        @endforelse
                                        

                                        </div>
                                    </div>
                                </div>
                                <div class="content">
                                    <div>
                                        <!-- The tabs content -->
                                        <div class="leading-8 text-md">
                                            <h2 class="text-xl font-semibold">About This <span class="text-serv-button">Services</span></h2>
                                            <div class="mt-4 mb-8 content-description">
                                                <p>
                                                    {{ $service->description ?? ''}}
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
                                    </div>
                                </div>
                            </main>
                            <aside class="p-4 lg:col-span-5 md:col-span-12 md:pt-0">
                                <div class="mb-4 border rounded-lg border-serv-testimonial-border">
                                    <div class="flex items-center px-2 py-3 mx-4 mt-4 border rounded-full border-serv-testimonial-border">
                                        <div class="flex-1 text-sm font-medium text-center">
                                            <svg class="inline" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="12" r="8" stroke="#082431" stroke-width="1.5" />
                                                <path d="M12 7V12L15 13.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                            </svg>
                                            {{$order->service->delivery_time ?? ''}} Days Delivery
                                        </div>
                                        <div class="flex-1 text-sm font-medium text-center">
                                            <svg class="inline" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="24" height="24" fill="white" />
                                                <path d="M19 13C19 15 19 18.5 14.6552 18.5C9.63448 18.5 6.12644 18.5 5 18.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M4 11.5C4 9.5 4 6 8.34483 6C13.2455 6 16.8724 6 18 6" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M7 21.5L4.14142 18.6414C4.06332 18.5633 4.06332 18.4247 4.14142 18.3586L7 15.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M16 3L18.8586 5.85858C18.9247 5.92468 18.9247 6.06332 18.8586 6.14142L16 9" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                            </svg>
                                            {{$order->service->revision_limit ?? ''}} Revision Limit
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
                                </div>
                            </aside>
                            <div class="p-4 lg:col-span-6 md:col-span-12">
                                <button type="submit" class="inline-flex justify-center px-3 py-2 mb-2 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                    Programming & Tech
                                </button>
                                <button type="submit" class="inline-flex justify-center px-3 py-2 mb-2 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                    Website Developer
                                </button>
                            </div>
                            <div class="p-4 md:text-right lg:col-span-6 md:col-span-12">
                                <a href="#" class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300">
                                    See Reviews
                                </a>
                                <a href="{{route('member.service.edit',$order->service->id)}}" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-lg shadow-sm bg-serv-email hover:bg-serv-email-text focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-serv-email">
                                    Edit Service
                                </a>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </section>
</main>
@endsection

@push('after-script')
<script>
    function gallery() {
        return {
            featured: 'https://source.unsplash.com/_SgRNwAVNKw/1600x900/',
            active: 1,
            changeThumbnail: function(url, position) {
                this.featured = url;
                this.active = position;
            }
        }
    }
</script>
@endpush