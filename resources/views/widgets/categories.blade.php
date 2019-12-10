<div class="widget-categories  push-down-30">
    <h6>РАЗДЕЛЫ</h6>
    <ul>
        @foreach ($categories as $category)
            <li>
                <a href="#"> {{ $category->name }} &nbsp; <span class="widget-categories__text">(16)</span> </a>
            </li>
        @endforeach
    </ul>
</div>
