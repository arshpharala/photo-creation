@extends("layouts.master")
@section('content')

<section class="banner contact-us"> 


        @include("layouts.navbar")
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
                            <span><img src="src/img/master/plus.svg" alt="plus">Discover</span>
                        </button>
                    </div>
                </div>
            </div>

</section>
   
        <section class="contact-info">
            <div class="container">
                <div class="info-list">
                    <div class="info-content">
                        <h2 class="heading">
                           Where <span data-aos="fade-left">
                                We Work
                            </span>
                        </h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretiumquis, sem. Nulla consequat massa quis enim.
                        </p>
                        <ul>
                            <li>
                                <a href="tel:{{websiteDetail()->contact_number}}" target="_blank">
                                    <i class="fa-solid fa-phone"></i>
                                    {{websiteDetail()->contact_number}}
                                </a>
                            </li>
                            <li>
                                <a href="mailto:{{websiteDetail()->contact_email}}">
                                    <i class="fa-solid fa-envelope"></i>
                                    {{websiteDetail()->contact_email}}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="info-form">
                        <form action=""  onsubmit="submitEnquiry(this)" id="contact-us">
                        @csrf
                        <input type="hidden" name="type" value="contact"> 
                        <input type="hidden" name="Url" id="url" value="{{Request::url()}}">
                            <input type="text" placeholder="Name" name="user_name">
                            <input type="email" placeholder="Email" name="email">
                            <input type="number" placeholder="Phone Number" name="phone">
                            <input type="text" placeholder="Address" name="address">
                            <textarea   placeholder="Message here!" name="message"> </textarea>
                            <button class="btn btn-1 hover-filled-slide-left btn-yellow formBtn" onclick="EnquiryFormSubmit('enquiry',this)">
                                <span> 
                                    <i class="fa-solid fa-paper-plane"></i> Submit</span>
                                    <div class="loader"></div>
                            </button>
                        </form>
                    </div>
                    <div class="thank-you" style="display:none">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 122.88"><defs><style>.cls-1{fill:#fbd433;}.cls-1,.cls-2{fill-rule:evenodd;}.cls-2{fill:#141518;}</style></defs><title>smiley</title><path class="cls-1" d="M45.54,2.11A61.42,61.42,0,1,1,2.11,77.34,61.42,61.42,0,0,1,45.54,2.11Z"/><path class="cls-2" d="M45.78,32.27c4.3,0,7.79,5,7.79,11.27s-3.49,11.27-7.79,11.27S38,49.77,38,43.54s3.48-11.27,7.78-11.27Z"/><path class="cls-2" d="M77.1,32.27c4.3,0,7.78,5,7.78,11.27S81.4,54.81,77.1,54.81s-7.79-5-7.79-11.27S72.8,32.27,77.1,32.27Z"/><path d="M28.8,70.82a39.65,39.65,0,0,0,8.83,8.41,42.72,42.72,0,0,0,25,7.53,40.44,40.44,0,0,0,24.12-8.12,35.75,35.75,0,0,0,7.49-7.87.22.22,0,0,1,.31,0L97,73.14a.21.21,0,0,1,0,.29A45.87,45.87,0,0,1,82.89,88.58,37.67,37.67,0,0,1,62.83,95a39,39,0,0,1-20.68-5.55A50.52,50.52,0,0,1,25.9,73.57a.23.23,0,0,1,0-.28l2.52-2.5a.22.22,0,0,1,.32,0l0,0Z"/></svg>
                        <h3>Thank you for enquiry. We will get back to you soon.</h3>
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
<!-- 
        <section class="blogs">
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

        </section>
        -->
    </main>
</body>
@endsection
<script src="{{url('script/jquery-3.3.1.min.js')}}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
  </script>
<script>

var formValidationUrl = '{{ route('validateEnquiry') }}';
    var formSubmitUrl = '{{ route('sendEnquiry') }}';
    // Start Fixed Header
    window.onscroll = function () {
        myFunction()
    };
    var header = $("#fixheader");
    var sticky = header.offsetTop;

    function myFunction() {
        if ($(this).scrollTop() > 400 && $(this).width() >= 320) {
            header.addClass("sticky").removeClass("sticky-down");
            $('.dropdown').removeClass('menu-active');
        } else {
            header.removeClass("sticky").addClass("sticky-down");
        }
    };
    // End Fixed Header

    // Start Toogle Menu
    function toggleMenu() {
        $("#menuToggle").toggleClass('active');
    };
    // End Toggle Menu  
  
    // $(document).ready(function(){
    //     $('body').click(function(){
    //         $('.dropdown').removeClass('menu-active');
            
    //     });
    //     $('#maindropdown').click(function(){
    //         $('.dropdown').toggleClass('menu-active');
    //         event.stopPropagation();
        
    //     });
       
    
    // });

    function EnquiryFormSubmit(formType, button) {
        // if (button != null) {
        //     consentValidation = checkConsent(button);
        //     if (consentValidation == false) {
        //         return false;
        //     }
        // }
    }


      function submitEnquiry(formElement) {
        button = $(formElement).find('button').first();
        event.preventDefault();
        // if (checkConsent(button) == false) {
        //     return false;
        // }

        formData = $(formElement).serialize();

        $.ajax({
            url: formValidationUrl,
            data: formData,
            type: "post",
            beforeSend: function() {

                 $('.btn1').addClass('disabled');

            },
            complete: function() {
              
            },
            success: function(response) {

                // console.log(response);
               
                if (response == "done") {


                    processEnquiry(formData);
                    
                } else {
                    alert("failed");
                    return false;
                }
            },
            error: function(err) {

                console.log(err);

                $(formElement).find("button,input").attr('disabled', false);
                errors = err.responseJSON.errors;
                $.each(errors, function(index, value) {

                   $(formElement).find("input[name='" + index + "']").addClass('input-error');
                   $(formElement).find("input[name='" + index + "']").attr('placeholder',value);
                 
                });
            }
        });
    }

    function processEnquiry(formData) {

$.ajax({
    url: formSubmitUrl,
    data: formData,
    type: "post",
    headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        },
    timeout: 90000,
    global: false,
    beforeSend: function(){
       

         $('.loader').show();
         $('.formBtn').addClass('disabled');
        //     var input = '{{ csrf_field() }}';
        //     var form = $('<form>').attr('id', 'thank-you').attr('method', 'post').attr('action',
        //         '{{ route('thanks') }}').html(input);
        //     $('body').append(form);
        
        // $('div.scene').css("display", "flex");
    },
    success: function(response) {

        if (response == 'done') {

            $('.info-form').hide();
            $('.thank-you').show();
        }
    }
});
}
</script>

</html>