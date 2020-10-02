<div>
    <?php
                    $arr = [];
                    $num = [];
                    $len = 0;
                    $sum =0;
                    $test =[1,2];
                ?>
    @if ($bill!=Null)
    <h2>Thống kê tổng sản phẩm đã bán vào tháng {{ $month }} năm {{ $year }}<br>(Thống kê theo thương hiệu)</h2>
    {{-- <button onclick="view_chart_brand(1)" id="chart_bill_groupby_brand"  class="btn btn-primary"><h4>Xem ở dạng biểu đồ</h4></button> <br><br> --}}
    <div id="chart_brand">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Tên thương hiệu</th>
                    <th>Tổng số lượng đã bán</th>
                </tr>
            </thead>
            <tbody>




                @foreach ($brand as $item)
                    <?php
                        array_push($arr,$item->id);
                        array_push($num,0);
                        $len = $len + 1;
                    ?>
                @endforeach

                @foreach ($bill as $bil)
                    @foreach ($bil->order_details->groupBy('order_id') as $bill_de)

                        @foreach ($bill_de as $bl)

                            <?php
                                $a = $bl->product_detail->product_color->product->brand_id;
                            ?>
                            @for ($i = 0; $i < $len ; $i++)
                                @if ($a == $arr[$i])
                                    <?php
                                        $num[$i]= $num[$i] + $bl->quantity_buy;
                                    ?>

                                    <br>
                                @endif
                            @endfor
                        @endforeach
                    @endforeach
                @endforeach
                @for ($i = 0; $i < $len ; $i++)
                <tr>
                    <td>
                        {{ $brand[$i]->brand_name }}
                    </td>
                    <td>
                    {{$num[$i] }}
                    <?php $sum+= $num[$i];?>
                    </td>
                </tr>
                @endfor
                <tr style="background-color:rgb(176, 176, 255)">
                    <td>Tổng</td>
                    <td>{{ $sum }}</td>
                </tr>

            </tbody>
        </table>
    </div>
    @else
        {!! '<h2>Không có dữ liệu!</h2>' !!}
    @endif

</div>
