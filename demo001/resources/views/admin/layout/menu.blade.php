  <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="admin/users/list"><i class="fa fa-users fa-fw"></i> Tài khoản</a>
                        </li>
                        <li>
                            {{-- <?php $sumstt; ?> --}}
                            <a href="admin/bills/list"><i class="fa fa-th-list" aria-hidden="true"></i> Đơn đặt hàng &emsp;
                                {{-- @if ($sumstt !=0)
                                    {!! $sumstt."<i class='fa fa-bell-o' aria-hidden='true'></i>" !!}
                                @else
                                    
                                @endif --}}
                            </a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                         
                        <li>
                            <a href="admin/brands/list"><i class="fa fa-ticket" aria-hidden="true"></i> Thương Hiệu<span class="fa arrow"></span></a>
                            {{-- <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/brands/list"> Danh sách</a>
                                </li>
                                <li>
                                    <a href="admin/brands/add"> Thêm</a>
                                </li>
                            </ul> --}}
                            <!-- /.nav-second-level -->
                        </li>
<li>
                            <a href="admin/colors/list"><i class="fa fa-paint-brush" aria-hidden="true"></i> Màu<span class="fa arrow"></span></a>
                            {{-- <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/products/list"> Danh sách</a>
                                </li>
                                <li>
                                    <a href="admin/products/add"> Thêm</a>
                                </li>
                            </ul> --}}
                            <!-- /.nav-second-level -->
                        </li>
<li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Sản Phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/products/list"> Danh sách</a>
                                </li>
                                <li>
                                    <a href="admin/products/add"> Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="admin/suppliers/list"><i class="fa fa-truck" aria-hidden="true"></i> Nhà cung cấp<span class="fa arrow"></span></a>
                            {{-- <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/goodsreceipts/list"> Danh sách</a>
                                </li>
                                <li>
                                    <a href="admin/goodsreceipts/add"> Thêm</a>
                                </li>
                            </ul> --}}
                            <!-- /.nav-second-level -->
                        </li>
<li>
                            <a href="#"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i> Nhập hàng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/goodsreceipts/list"> Danh sách</a>
                                </li>
                                <li>
                                    <a href="admin/goodsreceipts/add"> Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                        

                        <li>
                            <a href="#"><i class="fa fa-money" aria-hidden="true"></i> Khuyến mãi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/salepromotions/list"> Danh sách</a>
                                </li>
                                <li>
                                    <a href="admin/salepromotions/add"> Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="admin/chart"><i class="fa fa-bar-chart-o fa-fw"></i> Thống kê<span class="fa arrow"></span></a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>