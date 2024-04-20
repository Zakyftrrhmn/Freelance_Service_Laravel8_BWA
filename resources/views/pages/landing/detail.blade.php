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
                        <h1 class="text-2xl font-semibold">I Will Design WordPress eCommerce Modules</h1>
                        <div class="my-3">
                            @include('component.landing.rating')
                        </div>
                    </div>
                    <div class="p-3 my-4 bg-gray-100 rounded-lg image-gallery" x-data="gallery()">
                        <img :src="featured" alt="" class="rounded-lg cursor-pointer w-100" data-lity>
                        <div class="flex overflow-x-scroll hide-scroll-bar dragscroll">
                            <div class="flex mt-2 flex-nowrap">
                                <img :class="{'border-4 border-serv-button': active === 1}" @click="changeThumbnail('https://source.unsplash.com/_SgRNwAVNKw/1600x900/',1)" src="{{url('https://source.unsplash.com/_SgRNwAVNKw/250x160/')}}" alt="" class="inline-block mr-2 rounded-lg cursor-pointer w-36">
                                <img :class="{'border-4 border-serv-button': active === 2}" @click="changeThumbnail('https://source.unsplash.com/GXNo-OJynTQ/1600x900/',2)" src="{{url('https://source.unsplash.com/GXNo-OJynTQ/250x160/')}}" alt="" class="inline-block mr-2 rounded-lg cursor-pointer w-36">
                                <img :class="{'border-4 border-serv-button': active === 3}" @click="changeThumbnail('https://source.unsplash.com/x-HpilsdKEk/1600x900/',3)" src="{{url('https://source.unsplash.com/x-HpilsdKEk/250x160/')}}" alt="" class="inline-block mr-2 rounded-lg cursor-pointer w-36">
                                <img :class="{'border-4 border-serv-button': active === 4}" @click="changeThumbnail('https://source.unsplash.com/hLit2zL-Dhk/1600x900/',4)" src="{{url('https://source.unsplash.com/hLit2zL-Dhk/250x160/')}}" alt="" class="inline-block mr-2 rounded-lg cursor-pointer w-36">
                                <img :class="{'border-4 border-serv-button': active === 5}" @click="changeThumbnail('https://source.unsplash.com/i1VQZsU86ok/1600x900/',5)" src="{{url('https://source.unsplash.com/i1VQZsU86ok/250x160/')}}" alt="" class="inline-block mr-2 rounded-lg cursor-pointer w-36">
                                <img :class="{'border-4 border-serv-button': active === 6}" @click="changeThumbnail('https://source.unsplash.com/iEiUITs149M/1600x900/',6)" src="{{url('https://source.unsplash.com/iEiUITs149M/250x160/')}}" alt="" class="inline-block mr-2 rounded-lg cursor-pointer w-36">
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div x-data="{ tab: window.location.hash ? window.location.hash.substring(1) : 'description' }" id="tab_wrapper">
                            <!-- The tabs navigation -->
                            <nav class="my-8" aria-label="navigation">
                                <a class="inline-block px-8 py-2 my-2 mr-2 font-medium rounded-xl" :class="{ 'bg-serv-bg text-white': tab === 'description','bg-serv-services-bg text-serv-bg' : tab !== 'description' }" @click.prevent="tab = 'description'; window.location.hash = 'description'" href="#">Description</a>
                                <a class="inline-block px-8 py-2 my-2 mr-2 font-medium rounded-xl" :class="{ 'bg-serv-bg text-white': tab === 'seller' ,'bg-serv-services-bg text-serv-bg' : tab !== 'seller' }" @click.prevent="tab = 'seller'; window.location.hash = 'seller'" href="#">About The Seller</a>
                                <a class="inline-block px-8 py-2 my-2 mr-2 font-medium rounded-xl" :class="{ 'bg-serv-bg text-white': tab === 'reviews' ,'bg-serv-services-bg text-serv-bg' : tab !== 'reviews' }" @click.prevent="tab = 'reviews'; window.location.hash = 'reviews'" href="#">Reviews</a>
                            </nav>

                            <!-- The tabs content -->
                            <div x-show.transition.duration.500ms="tab === 'description'" class="leading-8 text-md">
                                <h2 class="text-xl font-semibold">About This <span class="text-serv-button">Services</span></h2>
                                <div class="mt-4 mb-8 content-description">
                                    <p>
                                        I will design wordpress ecommerce modules, professional website for you using WordPress! With this Services
                                    </p>
                                </div>
                                <h3 class="my-4 text-lg font-semibold">Why choose my Service?</h3>
                                <ul class="mb-4 list-check">
                                    <li class="pl-10 my-2">Fast delivery</li>
                                    <li class="pl-10 my-2">Wide plugin support within WordPress</li>
                                    <li class="pl-10 my-2">I can design logos and such for your website</li>
                                    <li class="pl-10 my-2">Easily Communicate with me</li>
                                </ul>
                                <p class="mb-4">
                                    If you only require modifications made to an existing WordPress website that you have, I have a different Services for that, which you can find on my profile!
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
                                            <img src="https://avatars2.githubusercontent.com/u/1490347?s=460&u=39d7a6b9bc030244e2c509119e5f64eabb2b1727&v=4" alt="My profile" class="w-20 h-20 rounded-full ">
                                        </div>
                                        <div class="flex-grow p-4 -mt-8 leading-8 lg:mt-0">
                                            <div class="text-lg font-semibold text-gray-700">
                                                Alex Jones
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
                                        I am a web developer and web designer. I have an Associate Degree in Software
                                        and Web Development, and I have much experience in programming languages,
                                        such as HTML5, CSS3, PHP, Javascript and PHP. I can use Bootstrap and WordPress.
                                        I will provide fast response and clear communication in several languages.
                                        Feel free to contact me, thank you!
                                    </p>
                                </div>
                                <h3 class="my-4 text-lg font-semibold">My Experiences</h3>
                                <ul class="mb-8 list-check">
                                    <li class="pl-10 my-2">More than 9 years of experience</li>
                                    <li class="pl-10 my-2">Knowledge in the fields of interface design, marketing and etc</li>
                                    <li class="pl-10 my-2">Lead Developer at Sony Music for 8 Years</li>
                                </ul>
                                <h3 class="my-4 text-lg font-semibold">Skills</h3>
                                <div class="mb-8 skills">
                                    <span class="inline-block px-3 py-1 mr-2 rounded bg-serv-services-bg">Web Development</span>
                                    <span class="inline-block px-3 py-1 mr-2 rounded bg-serv-services-bg">Web Design</span>
                                </div>
                                <hr class="border-serv-services-bg">
                                <p class="my-4 text-lg text-gray-400">
                                    Joined Since 20 April 2021
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
                        <!--horizantil margin is just for display-->
                        <div class="flex items-start px-4 pt-6">
                            <img class="object-cover w-16 h-16 mr-4 rounded-full" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="avatar">
                            <div class="w-full">
                                <div class="flex items-center justify-between">
                                    <h2 class="my-1 text-xl font-medium text-serv-bg">Farzhan Pill</h2>
                                </div>
                                <p class="text-md text-serv-text">
                                    Website Developer
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center px-2 py-3 mx-4 mt-4 border rounded-full border-serv-testimonial-border">
                            <div class="flex-1 text-sm font-medium text-center">
                                <svg class="inline" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="8" stroke="#082431" stroke-width="1.5" />
                                    <path d="M12 7V12L15 13.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                7 Days Delivery
                            </div>
                            <div class="flex-1 text-sm font-medium text-center">
                                <svg class="inline" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="24" height="24" fill="white" />
                                    <path d="M19 13C19 15 19 18.5 14.6552 18.5C9.63448 18.5 6.12644 18.5 5 18.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M4 11.5C4 9.5 4 6 8.34483 6C13.3655 6 16.8736 6 18 6" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M7 21.5L4.14142 18.6414C4.06332 18.5633 4.06332 18.4367 4.14142 18.3586L7 15.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M16 3L18.8586 5.85858C18.9367 5.93668 18.9367 6.06332 18.8586 6.14142L16 9" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                1 Revision Limit
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
                                        Rp120.000
                                    </td>
                                </tr>

                            </table>
                        </div>
                        <div class="px-4 pb-4 booking">
                            <a href="#" class="block px-12 py-4 my-2 text-lg font-semibold text-center text-white bg-serv-button rounded-xl">
                                Booking Now
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </section>
        <div class="pt-6 pb-20 mx-8 lg:mx-20"> </div>
    </div>

@endsection