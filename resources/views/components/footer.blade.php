<footer class="site-footer matop">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6>About</h6>
                <p class="text-justify">Presto.it <br> <i>Shop wants to be simple </i><br> Siamo il miglior sito per vendere e comprare oggetti delle più disparate categorie... <br>
                    {{__('ui.esplora')}}</p>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Categories</h6>
                <ul class="footer-links">
                    @foreach($categories as $category)
                    <li><a href="{{route('category-rotta', [$category->name, $category->id])}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Quick Links</h6>
                <ul class="footer-links">
                    <li><a href="http://scanfcode.com/about/">About Us</a></li>
                    <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
                    <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
                    <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
                    <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
                </ul>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by
                    <a href="#">presto.it</a>.
                </p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fa-brands fa-facebook"></i></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a class="dribbble" href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>