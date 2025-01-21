@extends("layouts.master")

@section('content')
<section class="banner contact-us aboutus" > 
@include("layouts.navbar")
   

<div class="container ">
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
                        
                      </div>
                  </div>
              </div>
    </section>



          <!-- What we do -->
           <section class="whatwedo">
            <div class="container">
                <div class="create-project">
                    <div class="heading">
                        <h2 data-aos="fade-right" data-aos-offset="100"
                        data-aos-easing="ease-in-sine">what we do?</h2>
                    </div>
                    <div class="newproject">
                        <h3>A new way to create project</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        <a href="#">View more</a>
                    </div>
                    <div class="stats-details">
                        <div class="stat-item">
                            <span class="stat-number" data-target="149">0</span>
                            <span class="stat-label">Projects</span>
                          </div>
                          <div class="stat-item">
                            <span class="stat-number" data-target="135">0</span>
                            <span class="stat-label">Clients</span>
                          </div>
                          <div class="stat-item">
                            <span class="stat-number" data-target="12">0</span>
                            <span class="stat-label">Years</span>
                          </div>
                    </div>
                </div>
                <div class="create-project skills">
                    <div class="heading">
                        <h2 data-aos="fade-right" data-aos-offset="100"
                        data-aos-easing="ease-in-sine">SKILLS</h2>
                    </div>
                   
                    <div class="progress-section">
                        <div class="progress-item">
                          <div class="progress-label">
                            <span>Marketing</span>
                            <span>94%</span>
                          </div>
                          <div class="progress-bar">
                            <div class="progress-fill yellow" style="width: 94%;"></div>
                          </div>
                        </div>
                      
                        <div class="progress-item">
                          <div class="progress-label">
                            <span>Advertisements</span>
                            <span>94%</span>
                          </div>
                          <div class="progress-bar">
                            <div class="progress-fill teal" style="width: 94%;"></div>
                          </div>
                        </div>
                    </div>
                    <div class="newproject">
                        <h3>A new way to create project</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        <a href="#">View more</a>
                    </div>
                </div>
               
                <div class="create-project sayhi">
                    <div class="heading">
                        <h2 data-aos="fade-right" data-aos-offset="100"
                        data-aos-easing="ease-in-sine">SAY HI!</h2>
                    </div>                   
                  
                    <div class="newproject">
                        <h3>create project</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        <a href="#">View more</a>
                    </div>
                    <div class="newproject joinus">
                        <h3>want to join us?</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        <button class="btn btn-1 hover-filled-slide-left" data-aos="fade-left">
                            <span><img src="{{url('img/master/plus.svg')}}" alt="plus">Say Hi</span>
                        </button>
                    </div>
                </div>
                <div class="aboutbg"></div>
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

          @section('footerScript')

          <script>

document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.stat-number');

    counters.forEach(counter => {
        const animateCounter = () => {
            const target = +counter.getAttribute('data-target');
            const current = +counter.innerText;
            const increment = target / 400;

            if (current < target) {
                counter.innerText = Math.ceil(current + increment);
                requestAnimationFrame(animateCounter);
            } else {
                counter.innerText = target;
            }
        };
        // Start the counter animation
        animateCounter();
    });
});
     </script>

@endsection