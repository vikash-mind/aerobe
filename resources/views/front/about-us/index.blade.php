@extends('layouts.app')
@section('content')
  <!-- Main Content -->
  <section class="w-full">
        <section class="bg-[#E1F6F9]">
            <div class="relative h-[300px] overflow-hidden container grid md:grid-cols-2">
                <div class="h-[300px] relative hidden md:block">
                    <img src="img/bnr4.webp" alt="Hero Banner" width="800"
                        height="800" decoding="async" data-nimg="1" class="h-full"
                        style="color: transparent;">
                    <div class="absolute inset-y-0 left-0 w-8 bg-gradient-to-r from-[#E1F6F9] to-transparent z-10">
                    </div>
                    <div class="absolute inset-y-0 right-0 w-8 bg-gradient-to-l from-[#E1F6F9] to-transparent z-10">
                    </div>
                </div>
                <div class="container relative h-full flex flex-col justify-center items-center px-4 md:px-6">
                    <h1 class="text-4xl md:text-5xl font-bold text-primary mb-2">{{ $aboutUs->header_heading }}</h1>
                    <p class="text-primary/80">{{ $aboutUs->header_title }}</p>
                </div>
            </div>
        </section>
        <section class="container mx-auto px-4 md:px-6 py-12">
            <p class="text-sm font-light leading-8">{{ $aboutUs->about_desc }}
        </section>
        @include('front.elements.newsletter')
        <section class="container mx-auto px-4 md:px-6 py-12 relative">
            <img src="/img/service.webp" alt="About" loading="lazy" width="800"
                height="800" decoding="async" data-nimg="1" class="w-full rounded-xl max-w-[70%] hidden md:block"
               
                style="color: transparent;">
            <div
                class="md:h-[300px] md:w-[500px] bg-primary/80 md:rounded-s-xl md:absolute right-0 md:top-[50%] md:translate-y-[-50%] p-8">
                <div class="flex flex-row gap-4">
                    <div class="min-w-[6px] h-[100px] mt-1 bg-[#EBF785]"></div>
                    <div>
                        <p class="text-white text-xl font-extralight leading-6">{{ $aboutUs->header_desc }}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="mx-auto">
                    <div class="grid lg:grid-cols-[1.5fr_1fr] gap-12 items-center">
                        <div class="relative"><img alt="Asia Pacific Map" loading="lazy" width="600" height="400"
                                decoding="async" data-nimg="1" class="w-full h-auto" src="img/home/map/map.svg"
                                style="color: transparent;"></div>
                        <div class="space-y-8">
                            <div class="flex flex-col gap-2 mb-4">
                                <h3 class="text-sm text-primary uppercase font-semibold">Where we located?</h3>
                                <p class="text-2xl md:text-4xl">Our Location</p>
                            </div>
                            <div class="flex gap-6">
                                <div class="bg-pink-100 text-pink-600 rounded-lg p-6 px-8 text-center min-w-[120px]">
                                    <p class="text-sm">Presence in</p>
                                    <p class="text-4xl font-bold mb-1">{{ $websettingInfo->offices_in_countries }}</p>
                                    <p class="text-sm">Countries</p>
                                </div>
                                <div class="bg-gray-200 text-gray-600 p-6 px-8 rounded-lg text-center min-w-[120px]">
                                    <p class="text-sm">Customers in</p>
                                    <p class="text-4xl font-bold mb-1">{{ $websettingInfo->customers_in_countries }}</p>
                                    <p class="text-sm">Countries</p>
                                </div>
                            </div>
                            <div>
                                <ul class="space-y-3">
                                   @foreach($countries as $country)
                                    <li class="flex items-center gap-2">
                                      <p class="h-3 w-3 bg-pink-600 rounded-full"></p>
                                      <span class="text-sm">{{ $country->label }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-20">
            <div class="container mx-auto px-4">
                <div class="mx-auto grid gap-4 lg:grid-cols-[1fr_1.6fr]">
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex flex-col gap-2 mb-4">
                            <h3 class="text-sm text-primary uppercase font-semibold">Our Clients</h3>
                            <p class="text-2xl md:text-4xl">Our Prominent Customers</p>
                        </div>
                    </div>
                    <div class="grid gap-6">
                        <div
                            class="grid grid-cols-3 text-center md:grid-cols-6 text-xs lg:text-sm gap-6 border-b-[1px] text-muted-foreground">
                            @foreach($countries as $country)
                              <span
                                class="{{ $loop->first ? 'bg-primary/10 border-primary text-primary p-2 px-4 whitespace-nowrap cursor-pointer' : 'hover:text-primary hover:bg-primary/10 border-b-[1px] border-transparent hover:border-primary p-2 px-4 whitespace-nowrap cursor-pointer' }} country-name" data-id="{{ $country->id }}">{{ $country->label }}</span>
                              @endforeach
                        </div>
                        <div class="grid grid-cols-2 w-full md:grid-cols-5 gap-12">
                          @foreach($countries as $country)
                           @foreach($country->prominents as $prominent)
                              <div class="flex items-center justify-center list-{{ $country->id }} country-list hidden">
                                @if ($prominent->logo && file_exists(public_path('assets/uploads/prominents/' . $prominent->logo)))
                                  <img src="{{ asset('assets/uploads/prominents/' . $prominent->logo) }}" class="w-[120px] h-[60px]" alt="Customer Logo 1" />
                                @else
                                    <img src="{{ asset('assets/images/no-image.png') }}" class="w-[120px] h-[60px]" title="Site Logo" />
                                @endif
                              </div>
                            @endforeach
                           <div class="dummy w-[120px] h-[60px] {{ ($country->prominents->count() == 0) ? '' : 'hidden' }}"></div>  
                          @endforeach
                          <div class="dummy w-[120px] h-[60px] hidden"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-20">
            <div class="container mx-auto px-4">
                <div class="grid sm:grid-cols-2 mb-4">
                    <div class="flex flex-col gap-2 mb-4">
                        <h3 class="text-sm text-primary uppercase font-semibold">Customer testimonials</h3>
                        <p class="text-2xl md:text-4xl">What our customers say</p>
                    </div>
                    <div class="gap-2 hidden sm:flex mb-2 justify-end items-end"><button
                            class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-transparent shadow-sm hover:bg-accent hover:text-accent-foreground h-[44px] px-4 py-2"
                            disabled=""><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left">
                                <path d="m15 18-6-6 6-6"></path>
                            </svg> Previous</button><button
                            class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border bg-transparent shadow-sm hover:bg-accent hover:text-accent-foreground h-[44px] px-4 py-2 border-slate-300">Next
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="text-primary">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg></button></div>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="rounded-xl border bg-card text-card-foreground p-6 shadow-none border-primary/10">
                        <div class="flex items-center justify-between gap-4">
                            <div class="h-12 w-12 bg-gray-200 overflow-hidden"><img alt="Floyd Miles" loading="lazy"
                                    width="48" height="48" decoding="async" data-nimg="1"
                                    class="w-full h-full object-cover" src="img/u1.svg"
                                    style="color: transparent;"></div>
                        </div>
                        <h4 class="font-semibold my-3">Floyd Miles</h4>
                        <p class="text-muted-foreground mb-6">"The team at Aerobe has been exceptional in providing
                            support and innovative solutions for our healthcare facility."</p>
                    </div>
                    <div class="rounded-xl border bg-card text-card-foreground p-6 shadow-none border-primary/10">
                        <div class="flex items-center justify-between gap-4">
                            <div class="h-12 w-12 bg-gray-200 overflow-hidden"><img alt="Ronald Richards" loading="lazy"
                                    width="48" height="48" decoding="async" data-nimg="1"
                                    class="w-full h-full object-cover" src="img/u2.svg"
                                    style="color: transparent;"></div>
                        </div>
                        <h4 class="font-semibold my-3">Ronald Richards</h4>
                        <p class="text-muted-foreground mb-6">"The team at Aerobe has been exceptional in providing
                            support and innovative solutions for our healthcare facility."</p>
                    </div>
                    <div class="rounded-xl border bg-card text-card-foreground p-6 shadow-none border-primary/10">
                        <div class="flex items-center justify-between gap-4">
                            <div class="h-12 w-12 bg-gray-200 overflow-hidden"><img alt="Savannah Nguyen" loading="lazy"
                                    width="48" height="48" decoding="async" data-nimg="1"
                                    class="w-full h-full object-cover" src="img/u3.svg"
                                    style="color: transparent;"></div>
                        </div>
                        <h4 class="font-semibold my-3">Savannah Nguyen</h4>
                        <p class="text-muted-foreground mb-6">"The team at Aerobe has been exceptional in providing
                            support and innovative solutions for our healthcare facility."</p>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection