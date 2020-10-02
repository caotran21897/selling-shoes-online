@extends('store.layout.index')

@section('link')
<a href="/"><i class="fa fa-home"></i> Trang Chủ</a>
<span>Giày Nữ</span>
@endsection

@section('content')

    @foreach ($product as $item)
    <a href="store/product/detail/{{ $item->id }}">
        @if ($item->style ==3)
            <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img width="330" height="400" src="{{ $item->product_colors->first()->images->first()->image }}" alt="">
                    @if (count($sale)>0)
                        @foreach ($sale as $item_sale)
                            @foreach ($item_sale->products as $pro_sale)
                                @if ($pro_sale->id == $item->id)
                                <div class="sale pp-sale">Giảm giá</div>
                                @endif
                            @endforeach
                        @endforeach
                        
                    @endif
                    
                    <div class="icon">
                        @if ($item->style == 1)
                        <i class="fa fa-mars" aria-hidden="true"></i>
                        @else
                            @if ($item->style ==3)
                            <i class="fa fa-venus" aria-hidden="true"></i>
                            @else
                            <i class="fa fa-venus" aria-hidden="true"></i>
                            @endif
                        @endif
                    </div>
                    {{-- <ul>
                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                        <li class="quick-view"><a href="#">+ Add Cart</a></li>
                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                    </ul> --}}
                </div>
                <div class="pi-text">
                    <div class="catagory-name">{{ $item->brand->brand_name }}</div>
                    <a href="store/product/detail/{{ $item->id }}">
                        <h5>{{ $item->product_name }}</h5>
                    </a>
                    <div class="product-price">

                        @if (count($sale)>0)
                            @foreach ($sale as $item_sale)<?php $check =0;?>
                                @foreach ($item_sale->products as $goto)
                                
                                    @if ($goto->id == $item->id)
                                        <?php $check =1;?>
                                    @endif
                                                                   
                                @endforeach   
                                @if ($check==1)
                                    
                                    <strike style="color:rgb(255, 166, 0))">{{ number_format( $item->prices->last()->price) }}₫</strike><br>
                                    {{ number_format( $item->prices->last()->price*(1-$item_sale->discount*0.01)) }}₫
                                    
                                @else
                                    {{ number_format( $item->prices->last()->price) }}₫
                                @endif 
                            @endforeach
                            
                        @else
                        {{ number_format( $item->prices->last()->price) }}₫
                        @endif

                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
        @endif
        
    </a>
    @endforeach
@endsection