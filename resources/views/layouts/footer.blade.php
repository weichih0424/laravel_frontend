<footer class="footer">
    <div class="footer__btn" id="footer__btn"></div>
    <div class="footer__content">
        <div class="footer__logo">
            <img src="{{ URL::asset('storage/image/chicken.png') }}"alt=""><span>Follow US</span>
            <a href="https://github.com/weichih0424" class="me-4 text-reset">
                <i class="fa-brands fa-github-square fa-3x"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fa-brands fa-line fa-3x"></i>
            </a>
            <a href="https://www.instagram.com/marzdog_black_man/" class="me-4 text-reset">
                <i class="fa-brands fa-instagram-square fa-3x"></i>
            </a>
            <a href="https://www.facebook.com/profile.php?id=100000431239418" class="me-4 text-reset" target="_blank" rel="noopener noreferrer">
                <i class="fa-brands fa-facebook-square fa-3x"></i>
            </a>
        </div>
        <div class="footer__item">
            @foreach ($footers as $footer)
            <a href="{{ $footer->url }}">{{ $footer->name }}</a>
            @endforeach
        </div>
        <div class="footer__service">
            <a href="https://www.tvbs.com.tw/" target="_blank" rel="noopener noreferrer">
                <p><i class="fas fa-home me-3 fa-2x"></i>114台北市內湖區瑞光路451號</p></a> 
                <p><i class="fas fa-envelope me-3 fa-2x"></i> chouhuawen2@gmail.com</p>
                <p><i class="fas fa-phone me-3 fa-2x"></i> 0976247221</p>
        </div>  
        <div class="footer__bottom">
            <h6>
                <a href="https://www.tvbs.com.tw/" target="_new"> TVBS 官網</a>|
                <a href="https://news.tvbs.com.tw/" target="_new">TVBS 新聞網</a>
            </h6>
            <h6>© 測試工程師實習生Eric_Chou 周韋志 | 台北市內湖區瑞光路451號 | 聯利媒體股份有限公司</h6>
        </div>
    </div>
</footer>
{{-- <footer class="footer">
    <div class="footer__btn" id="footer__btn"></div>
    <div class="container-fluid">
        <div class="footer__top">
            <div class="row justify-content-between">
                <div class="col-auto mr-auto"><h2><img class="nav_img" src="{{ URL::asset('storage/image/chicken.png') }}" width='80px' height="80px">Follow US</h2></div>
                <div class="col-auto">
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
            </div>
        </div>
        <div class="footer__content">
            <div class="footer__item">
                <div class="row">
                    <div class="col-8">
                        <li><a href="#">公司簡介</a></li>
                </div>
                    <div class="col-4">
                        <a href="https://www.tvbs.com.tw/" target="_blank" rel="noopener noreferrer">
                        <p><i class="fas fa-home me-3 fa-2x"></i>114台北市內湖區瑞光路451號</p></a> 
                        <p><i class="fas fa-envelope me-3 fa-2x"></i> chouhuawen2@gmail.com</p>
                        <p><i class="fas fa-phone me-3 fa-2x"></i> 0976247221</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <h6>
                <a href="https://www.tvbs.com.tw/" target="_new"> TVBS 官網 </a>|
                <a href="https://news.tvbs.com.tw/" target="_new">TVBS 新聞網</a>
            </h6>
            <h6>© TVBS Media Inc. All Rights Reserved. 台北市內湖區瑞光路451號 | 聯利媒體股份有限公司</h6>
        </div>
        <div class="footer__item">
            <a href="#">公司簡介</a>
            <a href="#">人才招募</a>
            <a href="#">節目表</a>
            <a href="#">主播專區</a>
            <a href="#">企業動態</a>
            <a href="#">更正與澄清</a>
            <a href="#">新聞自律規範</a>
            <a href="#">個人資料保護</a>
            <a href="#">網站使用協定</a>
            <a href="#">版權宣告</a>
            <a href="#">業務服務</a>
            <a href="#">節目版權銷售</a>
            <a href="#">公開招標</a>
            <a href="#">頂尖事務所</a>
        </div>
        <div class="footer__service">
            <p>您的意見是我們前進的動力，歡迎來信或來電反映</p>
            <p>食尚編輯：<a href="mailto:supertaste@tvbs.com.tw">supertaste@tvbs.com.tw</a></p>
            <p>意見反映：<a href="mailto:service@tvbs.com.tw">service@tvbs.com.tw</a></p>
            <p>觀眾服務專線：02-2656-1599</p>
        </div>
        <div class="footer__bottom">
            <h6>
                <a href="https://www.tvbs.com.tw/" target="_new"> TVBS 官網</a>|
                <a href="https://news.tvbs.com.tw/" target="_new">TVBS 新聞網</a>
            </h6>
            <h6>© TVBS Media Inc. All Rights Reserved. 台北市內湖區瑞光路451號 | 聯利媒體股份有限公司</h6>
        </div>
    </div>
</footer> --}}
<script>
    $('#footer__btn').click(function () {
        if( $('footer').hasClass('is-expanded')){
            $('footer').removeClass('is-expanded')
        }else{
            $('footer').addClass('is-expanded')
        }
    })
</script>