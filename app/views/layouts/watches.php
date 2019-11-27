<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <base href="/">
    <?=$this->getMeta();?>
    <link rel="shortcut icon" href="<?=PATH;?>/images/star.png" type="image/png" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

    <link rel="stylesheet" href="megamenu/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="megamenu/css/ionicons.min.css" rel="stylesheet" type="text/css">
    <!--theme-style-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--start-menu-->


</head>
<body>
<!--top-header-->
<div class="top-header">
    <div class="container">
        <div class="top-header-main">
            <div class="row">
                <div class="col-md-6 top-header-left">
                    <div class="drop">
                        <div class="box">
                            <select id="currency" tabindex="4" class="dropdown drop">
                                <?php new \app\widgets\currency\Currency();?>
                            </select>
                        </div>
                        <div class="btn-group">
                            <a id="account" class="dropdown-toggle" data-toggle="dropdown">
                               Account<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">

                                <?php if(!empty($_SESSION['user'])) : ?>
                                <li><a href="#">Welcome, <?=h($_SESSION['user']['name'])?>
                                    </a></li>
                                <li><a href="user/logout">Logout</a></li>
                                <?php else : ?>
                                <li><a href="user/login">Login</a></li>
                                <li><a href="user/signup">Register</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-6 top-header-left">
                    <div class="cart box_1">
                        <a href="cart/show" onclick="getCart(); return false">
                            <div class="total">
                                <img src="images/cart-1.png" alt="" />
                                <?php if(!empty($_SESSION['cart'])) : ?>
                                    <span class="simpleCart_total">
    <?=$_SESSION['cart.currency']['symbol_left']. $_SESSION['cart.sum'].
    $_SESSION['cart.currency']['symbol_right'] ;?>
                                    </span>

                                <?php else : ?>
                                    <span class="simpleCart_total">Empty Cart</span>
                                <?php endif; ?>
                            </div>
                        </a>

<!--                        <a href="checkout.html">-->
<!--                            <div class="total">-->
<!--                                <span class="simpleCart_total"></span></div>-->
<!--                            <img src="images/cart-1.png" alt="" />-->
<!--                        </a>-->
<!--                        <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>-->
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!--top-header-->
<!--start-logo-->

<div class="logo">
    <a href="<?=PATH;?>"><h1>Luxury Watches</h1></a>
</div>
<!--start-logo-->
<!--bottom-header-->
<div class="header-bottom">
    <div class="container-fluid">
        <div class="header">
            <div class="row">
                <div class="col-md-9 header-left">
                    <div class="menu-container">
                        <div class="menu">
                            <?php new \app\widgets\menu\Menu([
                                'tpl' => WWW . '/menu/menu.php'
                            ]);?>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <div class="col-md-3 header-right">
                    <div class="search-bar search">
                        <form action="search" method="get" autocomplete="off">
                            <input type="text" class="typeahead" id="typeahead" name="s" placeholder="Search">
                            <input type="submit" value="">
                        </form>
<!--                        <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">-->
<!--                        <input id='search-img' type="submit" value="">-->
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--bottom-header-->
<!--banner-starts-->

<!--banner-ends-->

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']);?>
                    </div>
                <?php endif; ?>
                <?php if(isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?=$content;?>
</div>

<!--information-starts-->
<div class="information">
    <div class="container">
        <div class="infor-top">
            <div class="row">
                <div class="col-md-3 infor-left">
                    <h3>Follow Us</h3>
                    <ul>
                        <li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
                        <li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
                        <li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
                    </ul>
                </div>
                <div class="col-md-3 infor-left">
                    <h3>Information</h3>
                    <ul>
                        <li><a href="#"><p>Specials</p></a></li>
                        <li><a href="#"><p>New Products</p></a></li>
                        <li><a href="#"><p>Our Stores</p></a></li>
                        <li><a href="contact.html"><p>Contact Us</p></a></li>
                        <li><a href="#"><p>Top Sellers</p></a></li>
                    </ul>
                </div>
                <div class="col-md-3 infor-left">
                    <h3>My Account</h3>
                    <ul>
                        <li><a href="account.html"><p>My Account</p></a></li>
                        <li><a href="#"><p>My Credit slips</p></a></li>
                        <li><a href="#"><p>My Merchandise returns</p></a></li>
                        <li><a href="#"><p>My Personal info</p></a></li>
                        <li><a href="#"><p>My Addresses</p></a></li>
                    </ul>
                </div>
                <div class="col-md-3 infor-left">
                    <h3>Store Information</h3>
                    <h4>The company name,
                        <span>Lorem ipsum dolor,</span>
                        Glasglow Dr 40 Fe 72.</h4>
                    <h5>+955 123 4567</h5>
                    <p><a href="mailto:example@email.com">contact@example.com</a></p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--information-end-->
<!--footer-starts-->
<div class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-md-6 footer-left">
                    <form>
                        <input type="text" value="Enter Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email';}">
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
                <div class="col-md-6 footer-right">
                    <p>© 2015 Luxury Watches </p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--footer-end-->

<!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLongTitle">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-left" id="myModalTitle">Cart</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>


            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Add purchase</button>
                <a href="cart/view" type="button" class="btn btn-primary">Checkout</a>
                <button type="button" class="btn btn-danger" onclick="clearCart()">Clear cart</button>
            </div>
        </div>
    </div>
</div>

<div class="preloader"><img src="images/ring.svg" alt=""></div>


<?php $curr = \ishop\App::$app->getProperty('currency') ?>
<script>
    var path = '<?=PATH;?>',
        course = '<?=$curr['value'];?>',
        symbolLeft = '<?=$curr['symbol_left']?>',
        symbolRight = '<?=$curr['symbol_right'];?>';
</script>

<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script>
<script src="js/typeahead.bundle.js"></script>
<!--dropdown-->
<script src="js/jquery.easydropdown.js"></script>
<!--Slider-Starts-Here-->
<script src="js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
        $(function() {
            // Slideshow 4
            $.noConflict()
            $("#slider4").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
</script>

<script src="js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="megamenu/js/megamenu.js"></script>




<!--End-slider-script-->
<?php
use \RedBeanPHP\R as R;
$logs = R::getDatabaseAdapter()
    ->getDatabase()
    ->getLogger();

debug( $logs->grep( 'SELECT' ) );

?>
</body>
</html>
