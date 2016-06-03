<nav class="categories">
    <ul class="cat-menu">
        <li>
            <a href="/">Всі станції</a>
        </li>
        @foreach ($categories as $category)
            <li>
                <a href="{{ $category['alias'] . '-stations' }}" <?php echo preg_match('/' . $category['alias'] . '/', $_SERVER['REQUEST_URI']) ? 'class="active"' : ''; ?>>{{ $category['name'] }}</a>
            </li>
        @endforeach
        <div class="clear"></div>
    </ul>
</nav>