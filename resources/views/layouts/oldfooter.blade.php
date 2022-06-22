<!-- Footer -->
<footer class="footer_link text-center text-lg-start text-muted" style="background-color: #A6A6A6;">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom" style="background-color: #3B3B3B;">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block text-white">
        <h2>FOLLOW US</h2> 
        {{-- class="footer_text_color" --}}
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
        <a href="https://www.facebook.com/profile.php?id=100000431239418" class="me-4 text-reset" target="_blank" rel="noopener noreferrer">
            <i class="fa-brands fa-facebook-square fa-3x"></i>
        </a>
        <a href="https://www.instagram.com/marzdog_black_man/" class="me-4 text-reset">
            <i class="fa-brands fa-instagram-square fa-3x"></i>
        </a>
        <a href="" class="me-4 text-reset">
            <i class="fa-brands fa-line fa-3x"></i>
        </a>
        <a href="https://github.com/weichih0424" class="me-4 text-reset">
            <i class="fa-brands fa-github-square fa-3x"></i>
        </a>
    </div>
    <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="text-white">
    <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-5 col-lg-4 col-xl-3 mx-auto mb-6">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Company name
            </h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
            </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Products</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
            <a href="#!" class="text-reset">Angular</a>
            </p>
            <p>
            <a href="#!" class="text-reset">React</a>
            </p>
            <p>
            <a href="#!" class="text-reset">Vue</a>
            </p>
            <p>
            <a href="#!" class="text-reset">Laravel</a>
            </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Useful links</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
            <a href="#!" class="text-reset">Pricing</a>
            </p>
            <p>
            <a href="#!" class="text-reset">Settings</a>
            </p>
            <p>
            <a href="#!" class="text-reset">Orders</a>
            </p>
            <p>
            <a href="#!" class="text-reset">Help</a>
            </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="contact col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-white">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <a href="https://www.tvbs.com.tw/" target="_blank" rel="noopener noreferrer">
            <p><i class="fas fa-home me-3 fa-2x"></i>114台北市內湖區瑞光路451號</p></a> 
            <p><i class="fas fa-envelope me-3 fa-2x"></i> chouhuawen2@gmail.com</p>
            <p><i class="fas fa-phone me-3 fa-2x"></i> 0976247221</p>
        </div>
        <!-- Grid column -->
        </div>
        <!-- Grid row -->
    </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4 text-white" style="background-color: #878787;">
    © 2022 TVBS 軟體工程師實習生 Eric_Chou
    <a class="text-reset fw-bold" href="https://www.tvbs.com.tw/" target="_blank" rel="noopener noreferrer">
        網址：tvbs.com
    </a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
@section("script")
<script>
$('#footer__btn').click(function () {
    // alert("123");
    if( $('footer').hasClass('is-expanded')){
        $('footer').removeClass('is-expanded')
    }else{
        $('footer').addClass('is-expanded')
    }
})
</script>
@endsection