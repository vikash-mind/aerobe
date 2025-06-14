<div class="header-wrap">
  <div class="header-top">
    <div class="container">
      <div class="top-nav">
        <ul>
          @foreach($topMenus as $topMenu)
          <li><a href="{{ $topMenu->link }}">{{ $topMenu->label ?? '' }}</a></li>
          @endforeach
        </ul>
      </div>
    <div class="social">
      <ul>
         @if($websettingInfo->facebook_url)
         <li>
          <a href="{{ $websettingInfo->facebook_url }}"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></a></li>
         @endif
         @if($websettingInfo->instagram_url)
         <li><a href="{{ $websettingInfo->instagram_url }}"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line></svg></a></li>
         @endif
         @if($websettingInfo->twitter_url)
        <li><a href="{{ $websettingInfo->twitter_url }}"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path></svg></a></li>
        @endif
        @if($websettingInfo->linkedin_url)
        <li><a href="{{ $websettingInfo->linkedin_url }}"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect width="4" height="12" x="2" y="9"></rect><circle cx="4" cy="4" r="2"></circle></svg></a></li>
        @endif
        @if($websettingInfo->youtube_url)
        <li><a href="{{ $websettingInfo->youtube_url }}"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-youtube"><path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"></path><path d="m10 15 5-3-5-3z"></path></svg></a></li>
        @endif
      </ul>
    </div>
    <div class="global">
      <div class="g-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path><path d="M2 12h20"></path></svg> <span>{{ $countryName }}</span> <i class="fa fa-angle-down" aria-hidden="true"></i></div>

        <div class="global-menu">
          <ul>
            @foreach($countries as $country)
            <li><a href="{{ url('set-country') }}?country={{$country->label}}" @if($countryName == $country->label) style="background-color: #CFCFCF" @endif>{{ $country->label }}</a></li>
            @endforeach
          </ul>
        </div>
    </div>

  </div>
  </div>
  <div class="header-btm">
  <div class="container">
  <div class="header-left">
    <div class="logo">
      <a href="{{ url('/') }}">
         @if ($websettingInfo->site_logo && file_exists(public_path('assets/uploads/websettings/' . $websettingInfo->site_logo)))
            <img src="{{ asset('assets/uploads/websettings/' . $websettingInfo->site_logo) }}" title="Site Logo" />
          @else
              <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
          @endif
      </a>
    </div>
    <div class="menu-icon">
      <i class="fa fa-bars" aria-hidden="true"></i>
      <i class="fa fa-times" aria-hidden="true"></i>
    </div>
    <div class="nav-menu">
      <ul>
         @foreach($mainMenus as $mainMenu)
         @if($mainMenu->id === 1)
         <li><a href="javascript:;">{{ $mainMenu->label }}</a>
         <div class="dd-menu">
          <div class="left-menu">
            <ul>
               @foreach($categories as $category)
              <li class="{{ ($loop->first) ? 'active' : '' }}"><a href="javascript:void(0)" data-type="#{{ $category->label }}">{{ $category->label }}</a></li>
              @endforeach
            </ul>
          </div>
           @foreach($categories as $category)
          <div class="right-content {{ ($loop->first) ? 'active' : '' }}" id="{{ $category->label }}">
         @php
           $portfolioCount = 0;
         @endphp
         <div class="col">
         <ul>
            @foreach($category->ourPortfolios as $portfolio)
                @if($portfolioCount > 0 && $portfolioCount % 5 == 0)
                  </ul>
                </div>
                <div class="col">
                  <ul>
                @endif
                <li>
                  <a href="javascript:void(0)" data-heading="{{ $portfolio->title }}" data-paragraph="{{ $portfolio->short_description }}" data-type="portfolio">
                    {{ $portfolio->title }}
                  </a>
                </li>
                <div class="img" style="display: none">
                   @if ($portfolio->image && file_exists(public_path('assets/uploads/our-portfolios/' . $portfolio->image)))
                     <img src="{{ asset('assets/uploads/our-portfolios/' . $portfolio->image) }}" title="Site Logo" />
                   @else
                     <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120" data-holder-rendered="true" />
                   @endif
                </div>

                @php
                  $portfolioCount++;
                @endphp
            @endforeach
              </ul>
            </div>
            <div class="col">
               <div id="portfolio-img"></div>
               <div class="textb">
                  <h3></h3>
                  <p></p>
               </div>
            </div>
          </div>
          @endforeach
        </div>
        </li>
        @elseif($mainMenu->id === 2)
        <li><a href="javascript:;">{{ $mainMenu->label }}</a>
         <div class="dd-menu">
          <div class="left-menu">
            <ul>
              @foreach($categories as $category)
              <li class="{{ ($loop->first) ? 'active' : '' }}"><a href="javascript:void(0)" data-type="#sol-{{ $category->label }}">{{ $category->label }}</a></li>
              @endforeach
            </ul>
          </div>
          @foreach($categories as $category)
          <div class="right-content solution-category {{ ($loop->first) ? 'active' : '' }}" id="sol-{{ $category->label }}">
               @php
           $solutionCount = 0;
         @endphp
         <div class="col">
         <ul>
            @foreach($category->solutions as $solution)
                @if($solutionCount > 0 && $solutionCount % 5 == 0)
                  </ul>
                </div>
                <div class="col">
                  <ul>
                @endif
                <li>
                  <a href="javascript:void(0)" data-cat="{{ $category->label }}" data-heading="{{ $solution->title }}" data-paragraph="{{ $solution->short_description }}" data-type="solution">
                    {{ $solution->title }}
                  </a>
                </li>
                <div class="sol-img" style="display: none">
                   @if ($solution->image && file_exists(public_path('assets/uploads/solutions/' . $solution->image)))
                     <img src="{{ asset('assets/uploads/solutions/' . $solution->image) }}" title="Site Logo" />
                   @else
                     <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120" data-holder-rendered="true" />
                   @endif
                </div>

                @php
                  $solutionCount++;
                @endphp
            @endforeach
              </ul>
            </div>
            <div class="col">
               <div id="{{$category->label}}-solution-img"></div>
               <div class="textb">
                  <h3></h3>
                  <p></p>
               </div>
            </div>
          </div>
          @endforeach
        </div>
        </li>
        @else
        <li><a href="{{ $mainMenu->link }}">{{ $mainMenu->label }}</a></li>
        @endif
        @endforeach
      </ul>
    </div>
  </div>
  <div class="header-right">
    <div class="search-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cursor-pointer hover:text-primary transition-colors"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
    <div class="search-p">
      <h3>Search</h3>
      <input type="text" placeholder="Type to search...." class="input">
    </div>
    </div>
    <div class="connect-box">
      <div class="connect-with">Connect with us <i class="fa fa-angle-down" aria-hidden="true"></i></div>
      <div class="get-in-touch">
        <h3>Get in <span>Touch</span></h3>
        <p>Enim tempor eget pharetra facilisis sed maecenas adipiscing. Eu leo molestie vel, ornare non id blandit netus.</p>
        <form>
          <input type="text" class="input" placeholder="Name*">
          <input type="text" class="input" placeholder="Email">
          <input type="text" class="input" placeholder="Phone Number*">
          <textarea class="textarea" placeholder="Product info request"></textarea>
          <button class="c-btn">Send To Us</button>
        </form>
      </div>
    </div>
  </div>
    </div>
  </div>
</div>