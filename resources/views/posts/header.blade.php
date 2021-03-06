<header class="max-w-xl mx-auto mt-20 text-center">

    <h1 class="text-4xl">
        Personal <span class="text-blue-500">culinary arts</span> News
    </h1>

    <p class="text-sm mt-6 mb-4">
        Another year. Another meal. We're refreshing your meal with new ideas.
        I'm going to keep you guys up to speed with what's going on!
    </p>

    <!-- Category dropdown -->
    <x-category-dropdown />


        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/">

                @if(request('category'))
                    <input type="hidden" name="category" value="{{request('category')}}">
                    @endif

                <input type="text"
                       name="search"
                       placeholder="Find something"
                       class="bg-transparent placeholder-black font-semibold text-sm"
                       value="{{ request('search') }}">
            </form>
        </div>
    </div>
</header>
