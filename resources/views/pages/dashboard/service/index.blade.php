@extends('layouts.app')

@section('title', 'My Service')

@section('content')


    @if (count($services))
        <main class="h-full overflow-y-auto">

            <div class="container mx-auto">
                <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                    <div class="col-span-8">
                        <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                            My Services
                        </h2>
                        <p class="text-sm text-gray-400">
                           {{auth()->user()->service()->count()}} Total Services
                        </p>
                    </div>
                    <div class="col-span-4 lg:text-right">
                        <div class="relative mt-0 md:mt-6">
                            <a href="{{ route('member.service.create')}}" class="inline-block px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                                + Add Service
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <section class="container px-6 mx-auto mt-5">
                <div class="grid gap-5 md:grid-cols-12">
                    <main class="col-span-12 p-4 md:pt-0">
                        <div class="px-6 py-2 mt-2 bg-white rounded-xl">
                            <table class="w-full" aria-label="Table">
                                <thead>
                                    <tr class="text-sm font-normal text-left text-gray-900 border-b border-b-gray-600">
                                        <th class="py-4" scope="">Service Details</th>
                                        <th class="py-4" scope="">Role</th>
                                        <th class="py-4" scope="">Price</th>
                                        <th class="py-4" scope="">Status</th>
                                        <th class="py-4" scope="">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">

                                    @forelse ($services as $key => $service)
                                        <tr class="text-gray-700 border-b">
                                            <td class="w-2/6 px-1 py-5">
                                                <div class="flex items-center text-sm">
                                                    <div class="relative w-10 h-10 mr-3 rounded-full md:block">

                                                        @if (isset($service->thumbnail_service[0]->thumbnail) != null)
                                                            <img class="object-cover w-full h-full rounded" src="{{url(Storage::url($service->thumbnail_service[0]->thumbnail))}}" alt="thumbnail" loading="lazy" />
                                                        @else
                                                        <svg class="object-cover w-full h-full rounded text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999A4.002 4.002 0 0112 5a4.002 4.002 0 014-4 4.002 4.002 0 014 4 4.002 4.002 0 01-3.998 3.999z" /> 
                                                        </svg>
                                                        
                                                        @endif

                                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                    </div>
                                                    <div>
                                                        {{-- <a href="/dashboard/services/details.php" class="font-medium text-black">
                                                            Design WordPress <br>E-Commerce Modules
                                                        </a>  --}}
                                                        <a href="{{'#'}}" class="font-medium text-black">
                                                            {{ $service->title ?? '' }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-1 py-5 text-sm">
                                                {{ $service->user->detail_user->role ?? '' }}
                                            </td>
                                            <td class="px-1 py-5 text-sm">
                                                {{ "Rp " .number_format($service->price) ?? '' }}
                                            </td>
                                            <td class="px-1 py-5 text-sm text-green-500 text-md">
                                                {{ 'Active' }}
                                            </td>
                                            <td class="px-1 py-5 text-sm">
                                                <a href="{{route('member.service.edit', $service['id'])}}" class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-email">
                                                    Edit Service
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </main>
                </div>
            </section>
        </main>
    @else
        <div class="flex h-screen">
            <div class="m-auto text-center">
                <img src="{{asset('/assets/images/empty-illustration.svg')}}" alt="" class="w-48 mx-auto">
                <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                    There is No Requests Yet
                </h2>
                <p class="text-sm text-gray-400">
                    It seems that you haven’t provided any service. <br>
                    Let’s create your first service!
                </p>

                <div class="relative mt-0 md:mt-6">
                    <a href="{{route('member.service.create')}}" class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                        + Add Services
                    </a>
                </div>
            </div>
        </div>
    @endif

    
@endsection