<div id="index" class="h-screen">
    <div class="home h-screen  overflow-x-hidden">
        <div id="index" class="h-screen">
            <div class="home h-screen  overflow-x-hidden">
                <nav>
                    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                        <!-- Logo and Site Name -->
                        <a href="https://flowbite.com/" class="flex items-center">
                            <img src="../assets/logo.png" class="h-8 mr-3" alt="Flowbite Logo" />
                            <span class="self-center text-2xl font-semibold whitespace-nowrap">FoodHub</span>
                        </a>

                        <!-- Search Form -->
                        <form action="../pages/search.php" method="GET" class="flex md:order-2">
                            <!-- Button for toggling the search input on small screens -->
                            <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 rounded-lg text-sm p-2.5 mr-1">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                            <!-- Search input field (hidden on small screens) -->
                            <div class="relative hidden md:block">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                    <span class="sr-only">Search icon</span>
                                </div>
                                <input type="text" id="search-input" name="search" class="block w-full p-2 pl-10 text-sm text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
                            </div>
                            <!-- Button for toggling the search input on medium-sized screens -->
                        <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-search" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                            </svg>
                        </button>
                    </form>

                    <!-- Menu Links (visible on medium-sized screens) -->
                    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
                        <div class="relative mt-3 md:hidden">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="text" id="search-navbar" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
                        </div>
                        <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium max-sm:bg-[var(--secondary)] border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 ">
                            <li>
                                <a href="../index.php" class="block py-2 pl-3 pr-4 rounded hover:text-[var(--primary)] md:p-0">Home</a>
                            </li>
                            <li>
                                <a href="recipe.php" class="block py-2 pl-3 pr-4 rounded hover:text-[var(--primary)] md:p-0">Recipes</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 pl-3 pr-4 rounded hover:text-[var(--primary)] md:p-0">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>