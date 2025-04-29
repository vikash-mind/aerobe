@extends('layouts.app')

@section('content')
   <div class="mid-section">
   <div class="healthcare">
      <div class="container">
      <div class="textb">
         <h1>{!! $homePage->banner_title !!}</h1>
         <p>{{ $homePage->banner_desc }}</p>
         <a href="#" class="c-btn">{{ $homePage->banner_button_text }}</a>
      </div>
      <div class="imgb">
         @if ($homePage->banner_image && file_exists(public_path('assets/uploads/home-page/' . $homePage->banner_image)))
            <img src="{{ asset('assets/uploads/home-page/' . $homePage->banner_image) }}" />
          @else
              <img src="{{ asset('assets/images/no-image.png') }}" class="rounded me-2" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
          @endif
      </div>
   </div>
   </div>
   <div class="who-we-are">
      <div class="container">
         <div class="imgb">
            @if ($homePage->section_image1 && file_exists(public_path('assets/uploads/home-page/' . $homePage->section_image1)))
              <img src="{{ asset('assets/uploads/home-page/'.$homePage->section_image1) }}" />
            @else
                <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
            @endif
         </div>
         <div class="textb">
            <h4>{!! $homePage->section_heading !!}</h4>
            <h3>{!! $homePage->section_title !!}</h3>
            <p>{!! $homePage->section_desc !!}</p>
            <a href="{!! $homePage->section_button_link !!}" class="c-btn">Explore More</a>
         </div>
      </div>
   </div>
   <div class="portfolio">
      <div class="container">
         <div class="title">
            <h4>OUR PORTFOLIO</h4>
            <h3>Our Business Verticals</h3>
         </div>
         <ul>
            @foreach($ourPortfolios as $ourPortfolio)
            <li>
               @if ($ourPortfolio->image && file_exists(public_path('assets/uploads/our-portfolios/' . $ourPortfolio->image)))
              <img src="{{ asset('assets/uploads/our-portfolios/'.$ourPortfolio->image) }}" />
               @else
                   <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
               @endif
               <h3>{{ $ourPortfolio->title }}</h3>
            </li>
            @endforeach
         </ul>
      </div>
   </div>
   @include('front.elements.newsletter')
   <div class="location">
      <div class="container">
         <div class="map"><img src="{{ asset('img/home/map/map.svg') }}" /></div>
         <div class="textb">
            <h4>WHERE WE LOCATED?</h4>
            <h3>Our Location</h3>
            <div class="box-row">
               <div class="col">
                  <p>Presence in</p>
                  <strong>{{ $websettingInfo->offices_in_countries }}</strong>
                  <p>Countries</p>
               </div>
               <div class="col">
                  <p>Customers in</p>
                  <strong>{{ $websettingInfo->customers_in_countries }}</strong>
                  <p>Countries</p>
               </div>
            </div>
            <ul>
               @foreach($countries as $country)
               <li>{{ \Illuminate\Support\Str::ucfirst(Str::lower($country->label)) }}</li>
               @endforeach
            </ul>
         </div>
      </div>
   </div>
   <!-- Prominent Customers -->
   @include('front.elements.prominent-customer')
   <div class="news-event">
      <div class="container">
         <div class="title">
            <h4>NEWS & EVENTS</h4>
            <h3>News & Events</h3>
         </div>
         <div class="column">
            @php($featuredNewsAndEvent = $newsAndEvents->first())
            <div class="imgb">
               @if ($featuredNewsAndEvent->author_image && file_exists(public_path('assets/uploads/news-events/' . $featuredNewsAndEvent->image)))
                <img src="{{ asset('assets/uploads/news-events/'.$featuredNewsAndEvent->image) }}" />
              @else
                  <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
              @endif
               <div class="caption">
                  <div class="tag-box">{{ $featuredNewsAndEvent->title }}</div>
                  <h3>{{ $featuredNewsAndEvent->short_description }}</h3>
                  <div class="user">
                     <div class="icon-img">
                        @if ($featuredNewsAndEvent->image && file_exists(public_path('assets/uploads/news-events/' . $featuredNewsAndEvent->image)))
                         <img src="{{ asset('assets/uploads/news-events/'.$featuredNewsAndEvent->image) }}" />
                       @else
                           <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
                       @endif
                     </div>
                     <p>{{ $featuredNewsAndEvent->author_name ?? '' }} {{ $featuredNewsAndEvent->event_date }}</p>
                  </div>
               </div>
            </div>
            <div class="news-list">
               <ul>
                  @foreach($newsAndEvents as $newsAndEvent)
                  <li>
                     <div class="textb">
                        <div class="tag-box red">RECENT UPDATES</div>
                        <h3><a href="#"> {{ $newsAndEvent->title ?? '' }}</a></h3>
                        <p><strong>4.83k</strong> views <strong>3.27k</strong> likes</p>
                        <div class="user">
                           <div class="icon-img">
                              @if ($newsAndEvent->author_image && file_exists(public_path('assets/uploads/news-events/' . $newsAndEvent->author_image)))
                                 <img src="{{ asset('assets/uploads/news-events/'.$newsAndEvent->author_image) }}" />
                              @else
                                 <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
                              @endif
                           </div>
                           <p>BY <strong>{{ $newsAndEvent->author_name ?? '' }}</strong> <span>·</span> {{ $newsAndEvent->event_date }}</p>
                        </div>
                     </div>
                     <div class="imgb">
                        @if ($newsAndEvent->image && file_exists(public_path('assets/uploads/news-events/' . $newsAndEvent->image)))
                      <img src="{{ asset('assets/uploads/news-events/'.$newsAndEvent->image) }}" />
                    @else
                        <img src="{{ asset('assets/images/no-image.png') }}" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
                    @endif
                     </div>
                  </li>
                  @endforeach
               </ul>
            </div>
         </div>
      </div>
   </div>

   <div class="testimonials">
      <div class="container">
         <div class="title">
            <h4>CUSTOMER TESTIMONIALS</h4>
            <h3>What our customers say</h3>
         </div>
         <div class="column">
            @foreach($testimonials as $testimonial)
            <div class="col">
               <div class="user">
                  @if ($testimonial->image && file_exists(public_path('assets/uploads/testimonials/' . $testimonial->image)))
                  <img src="{{ asset('assets/uploads/testimonials/'.$testimonial->image) }}" />
                   @else
                       <img src="{{ asset('assets/images/no-image.png') }}" class="w-full h-full object-cover" title="Site Logo" width="150" height="120"  data-holder-rendered="true" />
                   @endif
               </div>
               <h4>{{ $testimonial->label }}</h4>
               <p>{{ $testimonial->description }}</p>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</div>
@endsection