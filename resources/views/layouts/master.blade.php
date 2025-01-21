<!DOCTYPE html>
<html lang="en-US">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{metaData('title') }}</title>
    <meta name="description" content="{{ metaData('description') }} " />
    <meta name="keywords" content="{{ metaData('keyword') }}" />
    <link rel="stylesheet" href="{{url('style/main.min.css')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <main>

 
      @yield('content')

      <section class="footer">
            <div class="container">
                <div class="footer-inner">
                    <div class="footer-items">
                    {!! websiteDetail()->contact_footer !!}
                        
                    </div>
                    <div class="footer-items">
                        <h3>
                           Need Help
                        </h3>
                        <ul>
                        <li>
                                <a href="{{route('about')}}">About Us</a>                                
                            </li>
                            <li>
                                <a href="{{route('contact')}}">Contact Us</a>                                
                            </li>
                        </ul>
                    </div>
                    
                    <div class="footer-items">
                        <h3>
                          Have a Query?
                        </h3>
                        <ul>
                            <li>
                              <a href="tel:{{websiteDetail()->contact_number}}">{{websiteDetail()->contact_number}}</a> 
                            </li>
                            <li>
                               <a href="mailto:{{websiteDetail()->contact_email}}">{{websiteDetail()->contact_email}}</a> 
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>

    </main>

         

<script src="{{url('script/jquery-3.3.1.min.js')}}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
  </script>
<script>

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
  


</script>
    @yield('footerScript')
</body>
</html>



     