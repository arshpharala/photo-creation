
            <div class="logo-container" id="fixheader">
                <div class="container">
                    <a href="javascript:void(0)" class="logo">
                        <img src="{{url('img/master/logo.png')}}" alt="logo">
                    </a>
                    <div class="menu" id="menuToggle" onclick="toggleMenu()">
                        <img src="{{url('img/master/menu.svg')}}" alt="menu">
                    </div>
                    <div class="menu-links">
                        <a href="javascript:void(0)" class="menu-toggle" onclick="toggleMenu()">
                            <img src="{{url('img/master/back.svg')}}" alt="back">Back
                        </a>
                        <ul>
                            <li class="links-li">
                                <a  href="{{url('/')}}"class="smoothscroll">
                                    Home
                                </a>
                            </li>
                            <li class="links-li">
                                <a class="smoothscroll" id="maindropdown">
                                  Services
                                </a>
                                <div class="dropdown">

                                    @foreach(bannerDetails() as $banner)
                                    <a href="{{url('/banner/'.$banner->reference)}}">{{$banner->heading}}</a>
                                    @endforeach 
                                    <!-- <a href="#">Banner</a>
                                    <a href="#">Digital Vinyl</a>
                                    <a href="#">Poster</a>
                                    <a href="#">Business Card</a> -->
                                </div>
                            </li>
                            <!-- <li class="links-li">
                                <a  href="{{url('/blog')}}" class="smoothscroll">
                                    Blog
                                </a>
                            </li> -->
                            <li class="links-li">
                                <a href="{{url('/about')}}" class="smoothscroll">
                                    About Us
                                </a>
                            </li>
                            <li class="links-li">
                                <a href="{{url('/contact')}}"  class="smoothscroll">
                                    Contact Us
                                </a>
                            </li>
                          
                           
                        </ul>

                    </div>
                </div>
            </div>

