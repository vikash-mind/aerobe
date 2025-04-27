<!-- Quick Links -->
  <nav class="hidden md:flex bg-primary/10 px-4 py-2 justify-end gap-6 items-center">
    <!-- Left Side - Navigation Links -->
    <ul class="flex space-x-6 text-xs">
      @foreach($topMenus as $topMenu)
      <li>
        <a href="/{{ $topMenu->link }}"><span class="text-teal-700 hover:text-teal-900 cursor-pointer">{{ $topMenu->label ?? '' }}</span></a>
      </li>
      @endforeach
      <!-- <li>
        <a href="/work"><span class="text-teal-700 hover:text-teal-900 cursor-pointer">Work @Aerobe</span></a>
      </li>
      <li>
        <a href="/csr"><span class="text-teal-700 hover:text-teal-900 cursor-pointer">CSR</span></a>
      </li>
      <li>
        <a href="/contact"><span class="text-teal-700 hover:text-teal-900 cursor-pointer">Contact Us</span></a>
      </li> -->
    </ul>

    <!-- Right Side - Icons and Global Dropdown -->
    <div class="flex items-center gap-3">
      @if($websettingInfo->facebook_url)
      <a href="{{ $websettingInfo->facebook_url }}" class="bg-white hover:bg-gray-50 text-primary p-2 rounded-lg">
        <i data-lucide="facebook" class="w-4 h-4"></i>
      </a>
      @endif
      @if($websettingInfo->instagram_url)
      <a href="{{ $websettingInfo->instagram_url }}" class="bg-white hover:bg-gray-50 text-primary p-2 rounded-lg">
        <i data-lucide="instagram" class="w-4 h-4"></i>
      </a>
      @endif
      @if($websettingInfo->twitter_url)
      <a href="{{ $websettingInfo->twitter_url }}" class="bg-white hover:bg-gray-50 text-primary p-2 rounded-lg">
        <i data-lucide="twitter" class="w-4 h-4"></i>
      </a>
      @endif
      @if($websettingInfo->linkedin_url)
      <a href="{{ $websettingInfo->linkedin_url }}"
        class="bg-white hover:bg-gray-50 text-primary p-2 rounded-lg">
        <i data-lucide="linkedin" class="w-4 h-4"></i>
      </a>
      @endif
      @if($websettingInfo->youtube_url)
      <a href="{{ $websettingInfo->youtube_url }}"
        class="bg-white hover:bg-gray-50 text-primary p-2 rounded-lg">
        <i data-lucide="youtube" class="w-4 h-4"></i>
      </a>
      @endif
      <div class="relative">
        <button id="globalDropdownBtn"
          class="bg-white hover:bg-gray-50 text-primary flex gap-1 px-3 py-1 rounded-md text-sm">
          <i data-lucide="globe" class="w-4 h-4"></i>
          <span>Global</span>
          <i data-lucide="chevron-down" class="w-4 h-4 transition-transform" id="globalDropdownIcon"></i>
        </button>
        <div id="globalDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-[990] hidden">
         @foreach($countries as $country)
         <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ $country->label }}</a>
         @endforeach
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Navigation -->
  <header class="sticky top-0 z-50 w-full bg-white backdrop-blur-sm shadow-sm md:px-[20px]">
    <div class="container mx-auto px-4 h-16 flex items-center justify-between">
      <div class="flex gap-8">
        <a href="/" class="flex items-center space-x-2">
          @if ($websettingInfo->site_logo && file_exists(public_path('assets/uploads/websettings/' . $websettingInfo->site_logo)))
            <img src="{{ asset('assets/uploads/websettings/' . $websettingInfo->site_logo) }}" class="h-6" />
          @else
              <img src="{{ asset('assets/images/no-image.png') }}" class="h-6" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
          @endif
        </a>
        <nav class="hidden xl:flex items-center space-x-6">
          @foreach($mainMenus as $mainMenu)
          @if($mainMenu->id === 1)
          <div class="relative group" data-menu="portfolio">
            <a href="#"
              class="text-sm text-gray-700 hover:text-primary p-2 rounded transition-colors duration-200 flex items-center justify-between">
              <span>{{ $mainMenu->label }}</span>
              <i data-lucide="chevron-down" class="w-4 h-4 text-gray-400"></i>
            </a>
            <div
              class="absolute left-0 mt-2 w-[900px] bg-white border border-gray-200 rounded-md shadow-lg z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
              <div class="grid grid-cols-[1fr_1.5fr_1fr]">
                <!-- Left Column - Categories -->
                <div class="border-r border-gray-100 m-4">
                  @foreach($categories as $categorie)
                  <div class="p-2 cursor-pointer category-item {{ ($loop->first) ? 'active' : '' }}" data-category="{{ strtolower($categorie->label) }}">
                    <span class="font-medium">{{ $categorie->label }}</span>
                  </div>
                  @endforeach
                </div>

                <!-- Middle Column - Subcategories -->
                <div class="grid grid-cols-2 gap-2 h-fit pe-2 py-4 items-center">
                  <!-- Subcategories will be dynamically populated here -->
                </div>

                <!-- Right Column - Featured Image -->
                <div class="h-full relative max-h-full w-full">
                  <div class="relative h-full w-full min-h-[300px]">
                    <img class="featuredImage" src="" alt="Featured"
                      class="object-cover w-full h-full rounded-lg border border-gray-200 image" style="display: none" />
                  </div>
                  <div
                    class="absolute transition-all duration-300 bottom-0 left-0 bg-white/70 backdrop-blur-sm min-h-[150px] w-full text-gray-600 p-4 rounded-b-lg shadow-lg">
                    <p class="font-semibold text-lg text-gray-800 featuredTitle"></p>
                    <p class="text-sm text-gray-600 featuredDescription"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @elseif($mainMenu->id === 2)
          <div class="relative group" data-menu="solutions">
            <a href="#"
              class="text-sm text-gray-700 hover:text-primary p-2 rounded transition-colors duration-200 flex items-center justify-between">
              <span>{{ $mainMenu->label }}</span>
              <i data-lucide="chevron-down" class="w-4 h-4 text-gray-400"></i>
            </a>
            <div
              class="absolute left-0 mt-2 w-[900px] bg-white border border-gray-200 rounded-md shadow-lg z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
              <div class="grid grid-cols-[1fr_1.5fr_1fr]">
                <!-- Left Column - Categories -->
                <div class="border-r border-gray-100 m-4">
                  @foreach($categories as $categorie)
                  <div class="p-2 cursor-pointer category-item {{ ($loop->first) ? 'active' : '' }}" data-category="{{ strtolower($categorie->label) }}">
                    <span class="font-medium">{{ $categorie->label }}</span>
                  </div>
                  @endforeach
                </div>

                <!-- Middle Column - Subcategories -->
                <div class="grid grid-cols-2 gap-2 h-fit pe-2 py-4 items-center">
                  <!-- Subcategories will be dynamically populated here -->
                </div>

                <!-- Right Column - Featured Image -->
                <div class="h-full relative max-h-full w-full">
                  <div class="relative h-full w-full min-h-[300px]">
                    <img class="featuredImage" src="/placeholder.svg" alt="Featured"
                      class="object-cover w-full h-full rounded-lg border border-gray-200" />
                  </div>
                  <div
                    class="absolute transition-all duration-300 bottom-0 left-0 bg-white/70 backdrop-blur-sm min-h-[150px] w-full text-gray-600 p-4 rounded-b-lg shadow-lg">
                    <p class="font-semibold text-lg text-gray-800 featuredTitle">
                      
                    </p>
                    <p class="text-sm text-gray-600 featuredDescription"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @else
            <a href="../{{ $mainMenu->link }}"
              class="text-sm text-gray-700 hover:text-primary p-2 rounded transition-colors duration-200">{{ $mainMenu->label }}</a>
          @endif
          @endforeach
        </nav>
      </div>

      <div class="hidden xl:flex gap-4 text-gray-400">
        <div class="relative">
          <button id="searchBtn" class="cursor-pointer hover:text-primary transition-colors">
            <i data-lucide="search" class="w-5 h-5"></i>
          </button>
          <div id="searchDropdown" class="absolute right-0 mt-2 w-80 bg-white rounded-md shadow-lg py-4 px-4 hidden">
            <div class="space-y-2">
              <h4 class="font-medium">Search</h4>
              <input type="search" placeholder="Type to search..." class="w-full px-3 py-2 border rounded-md" />
            </div>
          </div>
        </div>
        <div class="relative">
          <button id="connectBtn" class="flex gap-2 items-center cursor-pointer hover:text-primary transition-colors">
            <span class="text-primary">Connect with us</span>
            <i data-lucide="chevron-down" class="w-5 h-5"></i>
          </button>
          <div id="connectDropdown" class="absolute right-0 mt-2 w-96 bg-white rounded-md shadow-lg py-4 px-4 hidden">
            <div class="space-y-4 max-w-md mx-auto p-4">
              <!-- Heading -->
              <h2 class="text-2xl font-bold text-secondary">
                Get in <span class="text-primary">Touch</span>
              </h2>
              <!-- Description -->
              <p class="text-sm text-gray-600">
                Enim tempor eget pharetra facilisis sed maecenas adipiscing. Eu leo molestie vel, ornare non id blandit
                netus.
              </p>
              <!-- Form -->
              <form class="space-y-4">
                <!-- Name Input -->
                <input type="text" placeholder="Name *" required
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent placeholder-gray-400 text-sm" />
                <!-- Email Input -->
                <input type="email" placeholder="Email"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent placeholder-gray-400 text-sm" />
                <!-- Phone Input -->
                <input type="tel" placeholder="Phone number *" required
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent placeholder-gray-400 text-sm" />
                <!-- Textarea -->
                <textarea placeholder="Product Info request"
                  class="w-full min-h-[100px] px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent placeholder-gray-400 text-sm"></textarea>
                <!-- Submit Button -->
                <button type="submit"
                  class="w-full px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-colors text-sm font-medium">
                  Send To Us
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <button id="mobileMenuBtn" class="xl:hidden p-2 hover:bg-gray-100 rounded-lg transition-colors"
        aria-label="Toggle Menu">
        <i data-lucide="menu" class="w-6 h-6"></i>
      </button>
    </div>
  </header>