@extends('layouts.front')
@section('title', 'Explore')
@section('content')

    <div class="content">
        <!-- services -->
        <div class="bg-serv-bg-explore overflow-hidden">
            <div class="pt-16 pb-16 lg:pb-20 lg:px-24 md:px-16 sm:px-8 px-8 mx-auto">
                <div class="text-center">
                    <h1 class="text-3xl font-semibold mb-1">Service Overviews</h1>
                    <p class="leading-8 text-serv-text mb-10">
                        Discover the world's top Freelancers
                    </p>
                </div>
                <nav class="my-8 text-center" aria-label="navigation">
                    <a class="bg-serv-bg text-white block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl" href="#">
                        All Services
                    </a>
                    <a class="bg-serv-explore-button text-serv-bg block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl" href="#">
                        Programming & Tech
                    </a>
                    <a class="bg-serv-explore-button text-serv-bg block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl" href="#">
                        Graphic Design
                    </a>
                    <a class="bg-serv-explore-button text-serv-bg block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl" href="#">
                        Digital Marketing
                    </a>
                    <a class="bg-serv-explore-button text-serv-bg block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl" href="#">
                        Business
                    </a>
                </nav>
                <div class="grid grid-cols lg:grid-cols-3 md:grid-cols-2 gap-4">

                    @forelse ($services as $item)
                        
                        @include('component.landing.service-explore')

                    @empty
                        
                    @endforelse
                </div>
                <div class="text-center mt-10">
                    <a class="bg-serv-explore-button text-serv-bg block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl" href="#">
                        Load More
                    </a>
                </div>
            </div>
        </div>

    </div>


@endsection