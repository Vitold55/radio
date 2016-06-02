<?php $url = $_SERVER['REQUEST_URI']; ?>
<div class="overlayBox">
    <div class="m__menu_holder">
        <ul class="m__menu">
            <li class="home menu-item current-menu-item page_item"><a href="/">Головна</a></li>
            <li class="menu-item"><a href="/about-page" <?php echo ($url == '/' || preg_match('/stations/', $url)) ? 'target="_blank"' : ''; ?>>Про радіо</a></li>
            <li class="menu-item"><a href="/cooperation-page" <?php echo ($url == '/' || preg_match('/stations/', $url)) ? 'target="_blank"' : ''; ?>>Співпраця</a></li>
            <li class="menu-item"><a href="/contacts-page" <?php echo ($url == '/' || preg_match('/stations/', $url)) ? 'target="_blank"' : ''; ?>>Контакти</a></li>
        </ul>
    </div>
</div>