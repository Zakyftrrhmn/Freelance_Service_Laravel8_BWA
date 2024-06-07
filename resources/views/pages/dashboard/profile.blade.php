@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<main class="h-full overflow-y-auto">
    <div class="container mx-auto">
        <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
            <div class="col-span-12">
                <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                    Edit My Profile
                </h2>
                <p class="text-sm text-gray-400">
                    Enter your data Correctly & Properly
                </p>
            </div>
        </div>
    </div>

    <section class="container px-6 mx-auto mt-5">
        <div class="grid gap-5 md:grid-cols-12">
            <main class="col-span-12 p-4 md:pt-0">
                <div class="px-2 py-2 mt-2 bg-white rounded-xl">
                    <form action="#" method="POST">
                        <div class="">
                            <div class="px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6">
                                        <div class="flex items-center mt-1">
                                            <span class="inline-block w-16 h-16 overflow-hidden bg-gray-100 rounded-full">
                                                <svg class="w-full h-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                            </span>
                                                
                                            <button type="button" class="px-3 py-2 ml-5 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                Choose File
                                            </button>

                                            <button type="button" class="px-3 py-2 ml-5 text-sm font-medium leading-4 text-red-700 bg-transparent rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                    <div class="md:col-span-6 lg:col-span-3">

                                        <label for="service-name" class="block mb-3 font-medium text-gray-700 text-md">Full Name</label>

                                        <input placeholder="Alex Jones" type="text" name="service-name" id="service-name" autocomplete="service-name" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                        
                                    </div>
                                    <div class="md:col-span-6 lg:col-span-3">
                                        <label for="service-name" class="block mb-3 font-medium text-gray-700 text-md">Role</label>

                                        <input placeholder="Website Developer" type="text" name="service-name" id="service-name" autocomplete="service-name" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">

                                    </div>
                                    <div class="md:col-span-6 lg:col-span-3">
                                        <label for="service-name" class="block mb-3 font-medium text-gray-700 text-md">Email Address</label>

                                        <input placeholder="Alex.jones@gmail.com" type="text" name="service-name" id="service-name" autocomplete="service-name" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">

                                    </div>
                                    <div class="md:col-span-6 lg:col-span-3">
                                        <label for="service-name" class="block mb-3 font-medium text-gray-700 text-md">Contact Number</label>

                                        <input placeholder="087721205555" type="number" name="service-name" id="service-name" autocomplete="service-name" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">

                                    </div>
                                    <div class="col-span-6">

                                        <label for="service-name" class="block mb-3 font-medium text-gray-700 text-md">Biografi</label>

                                        <textarea placeholder="Enter your biography here.." type="text" name="service-name" id="service-name" autocomplete="service-name" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" rows="4">I am a web developer and web designer. I have an Associate Degree in Software and Web Development, and I have muchexperience in programming languages, such as HTML5, CSS3, PHP, Javascript and PHP. I can use Bootstrap and WordPress.I will provide fast response and clear communication in several languages.  Feel free to contact me, thank you!</textarea>

                                    </div>
                                    <div class="col-span-6">

                                        <label for="service-name" class="block mb-3 font-medium text-gray-700 text-md">My Experience</label>

                                        <input placeholder="More than 9 years of experience" type="text" name="service-name" id="service-name" autocomplete="service-name" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">

                                        <input placeholder="Knowledge in the fields of interface design, marketing and etc" type="text" name="service-name" id="service-name" autocomplete="service-name" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">

                                        <input placeholder="Lead Developer at Sony Music for 8 Years" type="text" name="service-name" id="service-name" autocomplete="service-name" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">

                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 text-right sm:px-6">

                                <button type="submit" class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300">
                                    Cancel
                                </button>

                                <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    Save Changes
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