<!DOCTYPE html>
<html>
    <?=view('partials.header')->render();?>
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
                            <span class="logo-first-line">FMka.in.ua</span><span class="logo-second-line">онлайн радіо без меж</span>
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

            <?=View::make('partials.footer')->render();?>
        </div>

        <?=View::make('partials.menu')->render();?>

        <?php if (Config::get('app.debug') != true) : ?>
            <!-- Google Analytics -->
            <?=View::make('partials.analytics')->render();?>
        <?php endif; ?>
    </body>
</html>
