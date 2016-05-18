<!DOCTYPE html>
<html>
    <?=View::make('partials.header');?>
    <body>
        <div class="container">
            <header>
                <div class="header-wrap">
                    <div class="logo">
                        <a href="/">
                            <img src="<?=asset('/assets/images/verstka/fmka-logo.png')?>" alt="Fmka логотип" class="fmka-logo">
                        </a>
                    </div>
                    <h1>
                        <a href="/">
                            <span>FMka.in.ua</span><span>онлайн радіо без меж</span>
                        </a>
                    </h1>
                    <div class="menu_btn">
                        <i></i>
                        <i class="menu_first"></i>
                        <i class="menu_second"></i>
                        <i></i>
                    </div>
                    <div class="clear"></div>
                </div>
            </header>

            <div class="row">
                <div class="col-md-12">
                    <div class="content">

                        @yield('content')

                    </div>
                </div>
            </div>

            <?=View::make('partials.footer');?>
        </div>

        <?=View::make('partials.menu');?>
    </body>
</html>
