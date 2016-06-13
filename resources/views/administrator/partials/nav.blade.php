<ul id="navigation">
    <li class="{{ active('admin.dashboard') }}"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    
    <li class="{{ active(['admin/category/*', 'admin/category']) ? 'active open dropdown' :'' }}">
        <a role="button" tabindex="0"><i class="fa fa-list"></i> <span>Categories</span></a>
        <ul {{ is_active('admin/category/*') ? 'style=display:block;' :'' }}>
            <li class="{{ active(['admin/category']) ? 'active' : '' }}">
                <a href="{{ route('admin.category.index') }}">
                    <i class="fa fa-caret-right"></i> List category
                </a>
            </li>
            <li class="{{ active(['admin/category/create']) ? 'active' :'' }}">
                <a href="{{ route('admin.category.create') }}">
                    <i class="fa fa-caret-right"></i> Add new category
                </a>
            </li>
        </ul>
    </li>
    <li class="{{ active(['admin/page/*', 'admin/page']) ? 'active open dropdown' :'' }}">
        <a role="button" tabindex="0"><i class="fa fa-file-o"></i> <span>Pages</span></a>
        <ul {{ is_active('admin/page/*') ? 'style=display:block;' :'' }}>
            <li class="{{ active(['admin/page']) ? 'active' :'' }}">
                <a href="{{ route('admin.page.index') }}"><i class="fa fa-caret-right"></i>List page</a>
            </li>
            <li class="{{ active(['admin/page/create']) ? 'active' :'' }}">
                <a href="{{ route('admin.page.create') }}"><i class="fa fa-caret-right"></i>Add new page</a>
            </li>
        </ul>
    </li>
    <li class="{{ active(['admin/slider/*', 'admin/slider']) ? 'active open dropdown' :'' }}">
        <a role="button" tabindex="0"><i class="fa fa-delicious"></i> <span>Slider</span></a>
        <ul {{ is_active('admin/category/*') ? 'style=display:block;' :'' }}>
            <li class="{{ active(['admin/slider']) ? 'active' : '' }}">
                <a href="{{ route('admin.slider.index') }}">
                    <i class="fa fa-caret-right"></i>List image slider
                </a>
            </li>
            <li class="{{ active(['admin/slider/create']) ? 'active' : '' }}">
                <a href="{{ route('admin.slider.create') }}">
                    <i class="fa fa-caret-right"></i> Add new image
                </a>
            </li>
        </ul>
    </li>
    <li class="{{ active(['admin/news/*', 'admin/news']) ? 'active open dropdown' :'' }}">
        <a role="button" tabindex="0"><i class="fa fa-pencil"></i> <span>News</span></a>
        <ul {{ is_active('admin/news/*') ? 'style=display:block;' :'' }}>
            <li class="{{ active(['admin/news']) ? 'active' : '' }}">
                <a href="{{ route('admin.news.index') }}">
                    <i class="fa fa-caret-right"></i>List news
                </a>
            </li>
            <li class="{{ active(['admin/news/create']) ? 'active' : '' }}">
                <a href="{{ route('admin.news.create') }}">
                    <i class="fa fa-caret-right"></i> Add new post
                </a>
            </li>
        </ul>
    </li>
    <li class="{{ active(['admin/carriage/*', 'admin/carriage']) ? 'active open dropdown' :'' }}">
        <a role="button" tabindex="0"><i class="fa fa-shopping-cart"></i> <span>Motorbike</span></a>
        <ul {{ is_active('admin/carriage/*') ? 'style=display:block;' :'' }}>
            <li class="{{ active(['admin/carriage']) ? 'active' : '' }}">
                <a href="{{ route('admin.carriage.index') }}"><i class="fa fa-caret-right"></i> List all motorbike</a>
            </li>
            <li class="{{ active(['admin/carriage/create']) ? 'active' : '' }}">
                <a href="{{ route('admin.carriage.create') }}"><i class="fa fa-caret-right"></i> Add new motorbike</a>
            </li>
        </ul>
    </li>
    <li class="{{ active(['admin/gallery/*', 'admin/gallery']) ? 'active' :'' }}">
        <a href="{{ route('admin.gallery.index') }}"><i class="fa fa-table"></i> <span>Gallery</span></a>
    </li>
    <li class="{{ active(['admin/menu/*', 'admin/menu']) ? 'active' :'' }}">
        <a role="button" tabindex="0"><i class="fa fa-magic"></i> <span>Menus</span></a>
        <ul {{ is_active('admin/menu/*') ? 'style=display:block;' :'' }}>
            <li class="{{ active(['admin/menu']) ? 'active' : '' }}">
                <a href="{{ route('admin.menu.index') }}"><i class="fa fa-caret-right"></i> List menu</a>
            </li>
            <li class="{{ active(['admin/menu/create']) ? 'active' : '' }}">
                <a href="{{ route('admin.menu.create') }}"><i class="fa fa-caret-right"></i> Add menu</a>
            </li>
        </ul>
    </li>
    <li>
        <a role="button" tabindex="0"><i class="fa fa-envelope-o"></i> <span>Contact</span> <span class="badge bg-lightred">6</span></a>
        <ul>
            <li><a href=""><i class="fa fa-caret-right"></i> Inbox</a></li>
            <li><a href=""><i class="fa fa-caret-right"></i> Compose Mail</a></li>
        </ul>
    </li>
    <li>
        <a role="button" tabindex="0"><i class="fa fa-envelope-o"></i> <span>Order</span></a>
        <ul>
            <li><a href="{{ route('admin.orders.index') }}"><i class="fa fa-caret-right"></i> List order</a></li>
        </ul>
    </li>
    <li>
        <a role="button" tabindex="0"><i class="fa fa-envelope-o"></i> <span>Setting</span></a>
        <ul>
            <li><a href="{{ route('admin.settings.show') }}"><i class="fa fa-caret-right"></i> Index</a></li>
        </ul>
    </li>

</ul>