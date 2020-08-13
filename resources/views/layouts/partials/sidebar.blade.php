<div class="sidebar" data-color="purple" data-background-color="white"
    data-image="{{asset('backend')}}/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item  {{Request::is('admin/dashboard*')?'active':''}}">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item  {{Request::is('admin/slider*')?'active':''}}">
                <a class="nav-link" href="{{route('admin.slider.index')}}">
                    <i class="material-icons">slideshow</i>
                    <p>Slider</p>
                </a>
            </li>
            <li class="nav-item  {{Request::is('admin/category*')?'active':''}}">
                <a class="nav-link" href="{{route('admin.category.index')}}">
                    <i class="material-icons">list</i>
                    <p>Category</p>
                </a>
            </li>
            <li class="nav-item  {{Request::is('admin/item*')?'active':''}}">
                <a class="nav-link" href="{{route('admin.item.index')}}">
                    <i class="material-icons">todo</i>
                    <p>Item</p>
                </a>
            </li>
            <li class="nav-item  {{Request::is('admin/reserv*')?'active':''}}">
                <a class="nav-link" href="{{route('admin.reserv.index')}}">
                    <i class="material-icons">todo</i>
                    <p>Reservation</p>
                </a>
            </li>
            <li class="nav-item  {{Request::is('admin/section*')?'active':''}}">
                <a class="nav-link" href="{{route('admin.section.index')}}">
                    <i class="material-icons">todo</i>
                    <p>Section</p>
                </a>
            </li>
            <li class="nav-item  {{Request::is('admin/dish*')?'active':''}}">
                <a class="nav-link" href="{{route('admin.dish.index')}}">
                    <i class="material-icons">todo</i>
                    <p>Dish</p>
                </a>
            </li>
            <li class="nav-item  {{Request::is('admin/page_details*')?'active':''}}">
                <a class="nav-link" href="{{route('admin.page_details.index')}}">
                    <i class="material-icons">todo</i>
                    <p>Contact Details</p>
                </a>
            </li>
            <li class="nav-item  {{Request::is('admin/contact*')?'active':''}}">
                <a class="nav-link" href="{{route('admin.contact.index')}}">
                    <i class="material-icons">todo</i>
                    <p>Message</p>
                </a>
            </li>

        </ul>
    </div>
</div>