    <div class="menu-container flex-grow-1">
        <ul id="menu" class="menu">
            <li>
                <a href="{{route('admin.dashboard')}}">
                    <i data-cs-icon="shop" class="icon" data-cs-size="18"></i>
                    <span class="label">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#category" data-href="category">
                    <i data-cs-icon="cupcake" class="icon" data-cs-size="18"></i>
                    <span class="label">Category</span>
                </a>
                <ul id="category">
                <li>
                    <a href="{{route('category.create')}}">
                        <span class="label">Add New</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('category.index')}}">
                        <span class="label">List</span>
                    </a>
                </li>
                </ul>
            </li>
            <li>
                <a href="#product" data-href="product">
                    <i data-cs-icon="cupcake" class="icon" data-cs-size="18"></i>
                    <span class="label">Product</span>
                </a>
                <ul id="product">
                <li>
                    <a href="{{route('products.create')}}">
                        <span class="label">Add New</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('products.index')}}">
                        <span class="label">List</span>
                    </a>
                </li>
                </ul>
            </li>
            <li>
                <a href="#testimonial" data-href="testimonial">
                    <i data-cs-icon="cupcake" class="icon" data-cs-size="18"></i>
                    <span class="label">Testimonial</span>
                </a>
                <ul id="testimonial">
                <li>
                    <a href="{{route('testimonial.create')}}">
                        <span class="label">Add New</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('testimonial.index')}}">
                        <span class="label">List</span>
                    </a>
                </li>
                </ul>
            </li>

            <li>
                <a href="#orders" data-href="orderlist">
                <i data-cs-icon="cart" class="icon" data-cs-size="18"></i>
                <span class="label">Orders</span>
                </a>
                <ul id="orders">
                <li>
                    <a href="{{route('admin.orderlist')}}">
                    <span class="label">List</span>
                    </a>
                </li>

                </ul>
            </li>
            <li>
                <a href="#customers" data-href="customarlist">
                <i data-cs-icon="user" class="icon" data-cs-size="18"></i>
                <span class="label">Customers</span>
                </a>
                <ul id="customers">
                <li>
                    <a href="{{route('admin.customarlist')}}">
                    <span class="label">List</span>
                    </a>
                </li>
                </ul>
            </li>
            <li>
                <a href="{{route('coupon.index')}}">
                <i data-cs-icon="tag" class="icon" data-cs-size="18"></i>
                <span class="label">Coupon Discount</span>
                </a>
            </li>
        </ul>
    </div>
