<div class="hidden modal overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="registerSuccessModal" >
    <div class="relative w-128 my-6 mx-auto max-w-md">
    <!--content-->
    <div class="border-0 rounded-xl shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
        <!--header-->
        <div class="p-5 rounded-t-xl text-center mt-5 mx-10">
            <svg class="m-auto mb-5" width="160" height="160" viewBox="0 0 160 160" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="80" cy="80" r="80" fill="#F4F4FA"/>
                <path d="M113.335 55L67.502 100.833L46.6687 80" stroke="#22B07D" stroke-width="10" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            <h3 class="text-2xl font-semibold">
                Account Created
            </h3>
            <p class="text-gray-400 mt-1 text-sm">
                Explore Serv and start your real project
            </p>
        </div>
        <form action="index.php" method="GET">
            <!--footer-->
            <div class="px-6 pb-6 rounded-b-xl mx-10">
                <input type="hidden" name="auth" value="true">
                <a href="explore.php?auth" class="block text-center bg-serv-button text-white text-lg py-3 px-12 my-2 rounded-lg w-full" type="submit">
                    Find Services
                </a>
                <a href="dashboard/index.php" class="block text-center text-serv-text text-lg py-3 px-12 my-2 rounded-lg w-full" type="submit">
                    My Dashboard
                </a>
            </div>
        </form>
    </div>
    </div>
</div>
<div class="hidden opacity-75 fixed inset-0 z-40 bg-black" id="registerSuccessModal-backdrop"></div>