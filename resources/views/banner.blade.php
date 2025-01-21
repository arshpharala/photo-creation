  
@extends("layouts.master")

@section('content')
     
<section class="banner contact-us detailbanner"> 

@include('layouts.navbar')
      
      <div class="container">
                <div class="banner-container">

                    <div class="content">
                        <h1 data-aos="fade-left" data-aos-offset="100"
                        data-aos-easing="ease-in-sine">
                        {!! $pageDetail->banner['banner-content']->heading !!}
                        </h1>
                        <p data-aos="fade-left" data-aos-offset="100"
                        data-aos-easing="ease-in-sine">
                        {!! $pageDetail->banner['banner-content']->content !!}
                        </p>
                        <button class="btn btn-1 hover-filled-slide-left" data-aos="fade-left">
                            <span><img src="{{url('uploads/page/'.$pageDetail->banner['banner-content']->image)}}" alt="plus">{!! $pageDetail->banner['banner-content']->page_tag_line !!}</span>
                        </button>
                    </div>
                </div>
            </div>
    </section>

           <!-- Services Detail -->
          <section class="bannerdetail">
            <div class="container">
                <div class="banner-info">
                    <h2>{{$banner->heading}}</h2>
                    <p>{!! $banner->content !!}</p>
                </div>
                <div class="whatwedo">
                    <div class="left-project">
                        <h2>What We Do</h2>
                        <ul>                           
                            <li><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula.</p></li>
                            <li><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula.</p></li>
                            <li><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula.</p></li>
                            <li><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula.</p></li>
                        </ul>
                    </div>
                   
                    <div class="right-project">
                        <div class="project">
                            <h2>Create <span data-aos="fade-left" data-aos-offset="100"
                                data-aos-easing="ease-in-sine">Project</span> Now</h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget.</p>
                            <button type="button" class="btn btn-1 hover-filled-slide-left btn-yellow">
                                <span><img src="{{url('img/master/plus-black.svg')}}" alt="plus" class="plus"><img src="{{url('img/master/plus.svg')}}" alt="plus" class="white-icon">Discover</span>
                            </button>
                        </div>
                        
                    </div>
                </div>
            </div>
          </section>
          <section class="bannerdetail contactdetail">
            <div class="container">
                <div class="whatwedo">                                   
                    <div class="right-project">
                        <div class="project">
                            <h2>Create <span data-aos="fade-left" data-aos-offset="100"
                                data-aos-easing="ease-in-sine">Project</span> Now</h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget.</p>
                            <button type="button" class="btn btn-1 hover-filled-slide-left btn-yellow">
                                <span><img src="{{url('img/master/plus-black.svg')}}" alt="plus" class="plus"><img src="{{url('img/master/plus.svg')}}" alt="plus" class="white-icon">Discover</span>
                            </button>
                        </div>
                        
                    </div>
                    <div class="contact-bg">
                        <div class="icon">
                            <img src="{{url('img/master/call.svg')}}" alt="call" width="30" height="30">
                        </div>
                        <h3>
                            Looking for <br>
                            the best services?
                        </h3>
                        <p>Call anytime</p>
                        <a href="tel:{{websiteDetail()->contact_number}}" class="theme-btn">
                            {{websiteDetail()->contact_number}}
                        </a>
                    </div>
                </div>
            </div>
          </section>
       
          <!-- <section class="blogs">
              <div class="container">
                  <ul>
                      <li>
                          <h4><a href="#">We Can Help You Design Complete Experiences</a></h4>
                          <p>Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.</p>
                          <a href="#" class="blogdate">November 9, 2017 - Products</a>
                      </li>
                      <li>
                          <h4><a href="#">This is All You’ll Need to Traverse the Road to Success </a></h4>
                          <p>Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.</p>
                          <a href="#" class="blogdate">November 9, 2017 - Products</a>
                      </li>
                      <li>
                          <h4><a href="#">The affirmative action solutions for company.</a></h4>
                          <p>Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.</p>
                          <a href="#" class="blogdate">November 9, 2017 - Products</a>
                      </li>
                      
  
                  </ul>
              </div>
  
          </section> -->
    
  @endsection
