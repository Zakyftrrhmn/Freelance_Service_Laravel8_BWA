<div class="hidden modal overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="loginModal" >
    
    <div class="relative w-128 my-6 mx-auto max-w-md">

        <!--content-->
        <div class="border-0 rounded-xl shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="p-5 rounded-t-xl text-center mt-5 mx-10">

                <h3 class="text-2xl font-semibold"> Log in to Serv</h3>

                <p class="text-gray-400 mt-1 text-sm">Enter your email & password to continue</p>

            </div>
            <form method="POST" action="{{route('login')}}">
                @csrf
                <!--body-->
                <div class="relative p-6 flex-auto mx-10">
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm mb-2" for="email">Email</label>

                        <input name="email" class="appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 placeholder-serv-text text-xs" id="email" type="text" placeholder="name@domain.com" required autofocus>

                        @if ($errors->has('email'))
                         <p class="text-red-500 mb-3 text-sm">{{ $errors->first('email')}}</p>
                        @endif
                    </div>
                    <div>
                        <label class="block text-grey-darker text-sm mb-2" for="password">Password</label>

                        <input name="password" class="appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 placeholder-serv-text text-xs mb-3" id="password" type="password" placeholder="At least 8 characters" required autocomplete="current-password">

                        @if ($errors->has('password'))
                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('password')}}</p>
                       @endif
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="inline-block text-xs text-gray-400">
                            <label class="inline-flex items-center mt-3">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-serv-button rounded border-serv-text"><span class="ml-2 text-gray-400">Remember me</span>
                            </label>
                        </div>

                        <a class="inline-block align-baseline text-xs text-serv-button mt-2 font-medium" href="#">Forgot Password? </a>
                    </div>
                </div>
                <!--footer-->
                <div class="px-6 pb-6 rounded-b-xl mx-10">
                    <input type="hidden" name="auth" value="true">
                    <button class="bg-serv-button text-white text-lg py-3 px-12 my-2 rounded-lg w-full" type="submit">
                        Log in
                    </button>

                    <p href="#" class="text-center py-5">Dont have account? <a href="#" class="text-serv-button" onclick="toggleModal('loginModal');toggleModal('registerModal') ">Sign up</a>
                    </p>
                </div>

            </form>
        </div>

    </div>

</div>

<div class="hidden opacity-75 fixed inset-0 z-40 bg-black" id="loginModal-backdrop"></div>