@extends('layouts.master')
@section('content')

<section class="banner blog"> 

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


        <section class="blog-info">
            <div class="container">
                <div class="blog-container">
                    <div class="info-content">
                        <img src="{{$blog->getImagePath()}}" alt="blog-post-img">
                        <h2 class="heading">
                          {{ $blog->title}}
                         </h2>
                         <p>{!! $blog->content !!}</p>
                         <!-- <p>
                            Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.
                         </p>
                        <p>
                            <i>
                                “Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.”
                            </i>
                        </p> -->
                    </div>
                    <div class="info-right">
                        <div class="heading">
                            <span>
                                Recent 
                            </span>Blogs
                        </div>
                        @foreach($recentBlogs as $blog)
                        <div class="blog-item">
                            <img src="{{$blog->getImagePath()}}" alt="blog-img">
                            <div class="content">
                                <h3>
                                    {{$blog->title}}
                                </h3>
                                <a href="{{route('blog',['reference'=>$blog->reference])}}" class="blogdate">{{$blog->post_date}}</a>
                            </div>
                        </div>
                        @endforeach
                        <!-- <div class="blog-item">
                            <img src="{{url('img/master/blog-post-img.jpg')}}" alt="blog-img">
                            <div class="content">
                                <h3>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                </h3>
                                <a href="#" class="blogdate">November 9, 2017 - Products</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>

        <section class="img-section">
            <div class="container">
                <div class="img-inner">
                        <h2>
                            a new way to create project for your company
                        </h2>
                        <button class="btn btn-1 hover-filled-slide-left btn-yellow">
                            <span><img src="{{url('img/master/plus-black.svg')}}" alt="plus" class="plus"><img src="{{url('img/master/plus.svg')}}" alt="plus" class="white-icon">Discover</span>
                        </button>
                </div>
            </div>
        </section>

        <section class="blogs">
            <div class="container">
                <ul>

                  @foreach($blogs as $blog)
                    <li>
                        <h4><a href="{{route('blog',['reference'=>$blog->reference])}}">{{$blog->title}}</a></h4>
                        <p>{!! $blog->content !!}</p>
                        <a href="{{route('blog',['reference'=>$blog->reference])}}" class="blogdate">{!! $blog->post_date !!}</a>
                    </li>
                    @endforeach
                    <!-- <li>
                        <h4><a href="#">This is All You’ll Need to Traverse the Road to Success </a></h4>
                        <p>Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.</p>
                        <a href="#" class="blogdate">November 9, 2017 - Products</a>
                    </li>
                    <li>
                        <h4><a href="#">The affirmative action solutions for company.</a></h4>
                        <p>Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.</p>
                        <a href="#" class="blogdate">November 9, 2017 - Products</a>
                    </li>
                     -->

                </ul>
            </div>

        </section>
   
    </main>
</body>
@endsection
