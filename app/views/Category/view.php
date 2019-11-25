<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <?=$breadcrumbs;?>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="row">
                <div class="col-md-9 prdt-left">
                    <div class="product-one">
                        <?php if($products) :?>
                            <?php $curr = \ishop\App::$app->getProperty('currency');?>
                            <div class="row">
                                <?php foreach ($products as $product) : ?>
                                    <div class="col-md-4 product-left p-left">
                                        <div class="product-main simpleCart_shelfItem">
                                            <a href="product/<?=$product->alias?>" class="mask"><img class="img-responsive zoom-img" src="images/<?=$product->img;?>" alt="" /></a>
                                            <div class="product-bottom">
                                                <h3><?=$product->title?></h3>
                                                <p>Explore Now</p>
                                                <h4>
                                                    <a data-id="<?=$product->id;?>" class="add-to-cart-link" href="cart/add?<?=$product->id;?>"><i></i></a> <span class=" item_price"><?=$curr['symbol_left'];?><?=round($product->price * $curr['value']);?><?=$curr['symbol_right'];?></span>
                                                    <?php if($product->old_price): ?>
                                                        <small><del><?=$curr['symbol_left'];?><?=round($product->old_price * $curr['value']);?>
                                                                <?=$curr['symbol_right'];?></del></small>
                                                    <?php endif;?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="clearfix"></div>
                            <div class="m-5">
                                <?php if($pagination->countPages > 1) :?>
                                    <?=$pagination;?>
                                <?php endif;?>


                            </div>
                        <?php endif;?>

                    </div>
                </div>
                <div class="col-md-3 prdt-right">
                    <div class="w_sidebar">
                        <?php new \app\widgets\filter\Filter();?>
<!--                        <section  class="sky-form">-->
<!--                            <h4>Catogories</h4>-->
<!--                            <div class="row1 scroll-pane">-->
<!--                                <div class="col col-4">-->
<!--                                    <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>All Accessories</label>-->
<!--                                </div>-->
<!--                                <div class="col col-4">-->
<!--                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Women Watches</label>-->
<!--                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Kids Watches</label>-->
<!--                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Men Watches</label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </section>-->

                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--product-end--