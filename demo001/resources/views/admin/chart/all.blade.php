
    @if ($bill!=Null)
    <center>
        <h2>Thống kê tổng sản phẩm đã bán vào tháng {{ $month }} năm {{ $year }}<br>(Thống kê theo sản phẩm)</h2>
    </center>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Tổng số lượng đã bán</th>
            </tr>
        </thead>
        <tbody>
 
            
            <?php
                $name = [];
                $arr = [];
                $num = [];
                $len = 0;
                $sum=0;
            ?>            
            @foreach ($bill as $bil)
                @foreach ($bil->order_details->groupBy('order_id') as $bill_de)
                     
                    @foreach ($bill_de as $bl)
                        
                        <?php
                            $a = $bl->product_detail->product_color->product->id;
                           
                        ?>
                        {{-- {{ $a }} --}}
                        
                        <?php 
                            $KT = 0;
                        ?>
                        @for ($i = 0; $i < $len ; $i++)
                            @if ($a == $arr[$i])
                                <?php  
                                    $num[$i]= $num[$i] + $bl->quantity_buy;
                                ?>
                
                                @break
                            @endif
                            <?php 
                                $KT = $i +1 ;
                            ?>
                        @endfor
                        <BR>
                        @if ($KT == $len)
                            <?php
                            array_push($arr,$a);
                            array_push($num,$bl->quantity_buy);
                            $nameP = $bl->product_detail->product_color->product->product_name;
                            array_push($name,$nameP);
                            $len = $len + 1;
                            ?>
                        @endif
                    @endforeach
                @endforeach
            @endforeach
            
                @for ($i = 0; $i < $len ; $i++)
                <tr class="odd gradeX" >
                    <td>
                        {{$name[$i]}}
                    </td>
                    <td>
                        {{$num[$i] }}
                        <?php $sum+=$num[$i];?>
                    </td>
                </tr>
                @endfor
                <tr style="background-color:rgb(176, 176, 255)">
                    <td>Tổng</td>
                    <td>{{ $sum }}</td>
                </tr>
  
        </tbody>
    </table>
    @else
        {!! '<h2>Không có dữ liệu!</h2>' !!}
    @endif
