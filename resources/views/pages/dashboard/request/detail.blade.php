@extends('layouts.app')

@section('title', 'Detail Requst')

@section('content')
       
<main class="h-full overflow-y-auto">
    <div class="container mx-auto">
        <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
            <div class="col-span-8">
                <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                    My Requests
                </h2>
                <p class="text-sm text-gray-400">
                    3 Total Requests
                </p>
            </div>
            <div class="col-span-4 lg:text-right">

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
                                <th class="py-4" scope="">Freelancer Name</th>
                                <th class="py-4" scope="">Service Details</th>
                                <th class="py-4" scope="">Service Price</th>
                                <th class="py-4" scope="">Service Deadline</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr class="mb-10 text-gray-700">
                                <td class="px-1 py-5 text-sm w-2/8">
                                    <div class="flex items-center text-sm">
                                        <div class="relative w-10 h-10 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full" src="{{url('https://randomuser.me/api/portraits/men/6.jpg')}}" alt="" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                        </div>
                                        <div>
                                            <p class="font-medium text-black">Alexa Sara</p>
                                            <p class="text-sm text-gray-400">087785091245</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="w-2/6 px-1 py-5">
                                    <div class="flex items-center text-sm">
                                        <div class="relative w-10 h-10 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded" src="{{url('https://randomuser.me/api/portraits/men/3.jpg')}}" alt="" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                        </div>
                                        <div>
                                            <p class="font-medium text-black">
                                                Design WordPress <br>E-Commerce Modules
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-1 py-5 text-sm">
                                    Rp120.000
                                </td>
                                <td class="px-1 py-5 text-xs text-red-500">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline mb-1">
                                        <path d="M7.0002 12.8332C10.2219 12.8332 12.8335 10.2215 12.8335 6.99984C12.8335 3.77818 10.2219 1.1665 7.0002 1.1665C3.77854 1.1665 1.16687 3.77818 1.16687 6.99984C1.16687 10.2215 3.77854 12.8332 7.0002 12.8332Z" stroke="#F26E6E" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7 3.5V7L9.33333 8.16667" stroke="#F26E6E" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                    3 days left
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex p-8 border border-gray-200 rounded-lg bg-serv-upload-bg h-128">
                        <div class="m-auto text-center">
                            <img src="{{asset('assets/images/services-file-icon.svg')}}" alt="" class="w-20 mx-auto">
                            <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                                ProjectWordpress.zip
                            </h2>
                            <p class="text-sm text-gray-400">
                                Click “Download File” untuk mengunduhnya
                            </p>

                            <div class="relative mt-0 md:mt-6">
                                <button class="px-4 py-2 mt-2 text-left text-gray-700 rounded-xl bg-serv-hr">
                                    Download File
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <form action="#" method="POST">
                        <div class="">
                            <div class="p-1 mt-5">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6">
                                        <label for="service-name" class="block mb-3 font-medium text-gray-700 text-md">Note</label>
                                        <textarea placeholder="Enter your biography here.." type="text" name="service-name" id="service-name" autocomplete="service-name" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" rows="4">“Hai, aku baru saja mengirim zip file service yang kamu butuhkan. di dalamnya terdapat soft file dan panduan cara menggunakan service ini. terima kasih sudah order. jika butuh sesuatu bisa contact saya di whatsapp”</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="px-1 py-4 text-right">
                                <button type="submit" class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300">
                                    Back
                                </button>
                                <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    Approve
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>
</main>

@endsection