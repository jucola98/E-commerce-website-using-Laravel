@extends('frontend/layout')

@section('content')

<!-- CONTENT AREA -->
<article class="page-body">

<!--Breadcrumb Section Start-->
<section class="breadcrumb-bg-6">  
                <div class="site-breadcumb">                        
                    <h1 class="title-1">SingleProduct</h1> 
                        <ol class="breadcrumb breadcrumb-menubar">
                            <li> <a href="{{ route('master') }}"> Home </a> SingleProduct </li>                             
                        </ol>
                </div>  
</section>
<!--Breadcrumb Section End-->

<section class="wrapper sec-space single-product layout-simple">
    <!-- Single Product Starts -->
    <div class="container">
        <div class="row">
            <!-- Single Products Slider Starts --> 
            <div class="col-lg-4 col-md-5 col-sm-6 prod-slider-wrap">                                    
                <div class="owl-carousel prod-slider sync1">
                    <div class="item popup-gallery"> 
                        @if($singart->imgURI == null )
                        <img src="{{asset('img/home-fourteen/imgnotfound.png')}}" alt="" /> </a> 
                         @else
                         <img src="{{Voyager::image($singart->imgURI)}}" alt="">
                        @endif
                        
                        
                    </div>
                  <!--<div class="item popup-gallery"> 
                        <img src="{{asset('img/common/prod-layout/layout-2.jpeg')}}" alt=""> 
                        <a href="{{asset('img/common/prod-layout/layout-2.jpeg')}}" title="Product" class="caption-link popup"><i class="arrow_expand"></i></a>
                    </div>
                    <div class="item popup-gallery"> 
                        <img src="assets/img/common/prod-layout/layout-3.jpeg" alt=""> 
                        <a href="assets/img/common/prod-layout/layout-3.jpeg" title="Product" class="caption-link popup"><i class="arrow_expand"></i></a>
                    </div>
                    <div class="item popup-gallery"> 
                        <img src="assets/img/common/prod-layout/layout-4.jpeg" alt=""> 
                        <a href="assets/img/common/prod-layout/layout-4.jpeg" title="Product" class="caption-link popup"><i class="arrow_expand"></i></a>
                    </div>
                    <div class="item popup-gallery"> 
                        <img src="assets/img/common/prod-layout/layout-2.jpeg" alt=""> 
                        <a href="assets/img/common/prod-layout/layout-2.jpeg" title="Product" class="caption-link popup"><i class="arrow_expand"></i></a>
                    </div>
                    <div class="item popup-gallery"> 
                        <img src="assets/img/common/prod-layout/layout-4.jpeg" alt=""> 
                        <a href="assets/img/common/prod-layout/layout-4.jpeg" title="Product" class="caption-link popup"><i class="arrow_expand"></i></a>
                    </div>-->
                </div>

                <div  class="owl-carousel sync2">
                    <div class="item">
                        @if($singart->imgURI == null )
                        <img src="{{asset('img/home-fourteen/imgnotfound.png')}}" alt="" /> </a> 
                         @else
                         <img src="{{Voyager::image($singart->imgURI)}}" alt="">
                        @endif     
                    </div>
                    <br>
            
                    <!--<div class="item"> <img src="{{asset('img/common/prod-layout/thumb-2.jpeg')}}" alt=""> </div>
                    <div class="item"> <img src="assets/img/common/prod-layout/thumb-3.jpeg" alt=""> </div>
                    <div class="item"> <img src="assets/img/common/prod-layout/thumb-4.jpeg" alt=""> </div>  
                    <div class="item"> <img src="assets/img/common/prod-layout/thumb-2.jpeg" alt=""> </div>
                    <div class="item"> <img src="assets/img/common/prod-layout/thumb-4.jpeg" alt=""> </div>--> 
                </div>
            </div>
            <!-- Single Products Slider Ends --> 

            <!-- Products Description Starts --> 
            <div class="col-lg-8 col-md-7 col-sm-6">
                <div class="product-detail">
                    <div class="prod-lr-btn">                                   
                        <a href="#"> <i class=" arrow_left"></i> <img src="{{asset('img/common/prod-layout/next-1.jpg')}}" alt="" /> </a>
                        <a href="#"> <i class=" arrow_right "></i> <img src="{{asset('img/common/prod-layout/next-2.jpg')}}" alt="" /> </a>
                    </div>
                    <div class="product-heading">
                        <h2 class="section-title">{{$singart->name}}</h2>                                              
                    </div>
                    {{$singart->rating}}/5 &nbsp;
                    <div class="rating" id="starrating">   
                        
                        
                        @for ($i = 0; $i < 5; $i++)
                        
                        @if ($singart->rating-->0.5)
                            <span class="star active" name="{{$i+1}}"></span>
                        @else
                            
                            @if (($singart->rating--%10==0))
                                <span class="star half" name="{{$i+1}}"></span>
                            @else
                                <span class="no star" name="{{$i+1}}" ></span>
                                
                            @endif

                        @endif
                            
                        @endfor
                   
                    </div>  
                    <div class="price">
                        @if(($singart->sale)>0)
                            <b>{{($singart->price)-($singart->price)*($singart->sale/100)}}€</b> <del>{{$singart->price}}€</del><span class="green-color"> {{$singart->sale}}%</span>
                        @else
                            <b>{{($singart->price)}}€</b><!--forse va aggiunto un campo per gestire i saldi-->
                        @endif
                    </div>

                    <div class="product-availability">
                        <ul class="stock-detail list-items black-color">  
                            @if($singart->stock>0)                                     
                                <li class=""> <i class="icon-layers icons"></i> <span> Only <b>{{$singart->stock}}</b> Left </span> <i class="arrow_carrot-down"></i> </li>
                                @isset($cartamount)
                                    <li class=""> <i class="icon-handbag icons"></i> <span> You have <b>{{$cartamount->amount}}</b> products in your cart </span> <i class="arrow_carrot-down"></i> </li>
                                @endisset
                               
                                <li>
                                
                                <b>Available:</b> <span class="green-color"> In Stock </span>  
                                
                            @else
                                <b>Available:</b> <span class="red-color"> Not In Stock </span>  
                            @endif
                            </li>
                        </ul>                                                                             
                    </div>

                    <hr class="divider-2">   

                    <div class="product-description">
                        <p>{{$singart->detail}}</p>
                    </div>desc

                    <hr class="divider-2">   
                    <form action="{{route("testroute",["prodid"=>$singart->id])}}" method="post">
                    @csrf
                    
                    <div class="prod-btns">
                        @if($singart->stock>0)
                            @isset($cartamount->amount)
                                @if($singart->stock-$cartamount->amount>0)
                                <div class="quantity">
                                    <a class="btn minus" onclick='productTextHandler(false,{{$singart->stock-$cartamount->amount}});'><i class="icon_minus-06"></i></a>
                                    <input type="number" title="Qty" value="1" name="quantity" min="1" max="{{$singart->stock}}"step="1" class="form-control qty" text="1" id="quant" onchange='changeValueInput(this,{{$singart->stock}});'>
                                    <a class="btn plus" onclick='productTextHandler(true,{{$singart->stock-$cartamount->amount}});'><i class="icon_plus"></i></a>
                                </div>
                                <form action="{{route('wishlistadd')}}" method="post" class="formset">
                                                        @csrf
                                                        <button type="submit" value="{{$singart->id}}" name="prodid" id="heart"></button>
                                                       
                                                    </form>
                                <div class="add-to-cart">
                                 
                                    <input class="theme-btn-1 btn cart-btn" type="submit" value="Add to Cart" />
                                    
                                </div>
                               
                                
                                @endif
                                
                            @endisset   
                            <ul class="color-swatch-item">
                                       
                                        

                                        <select class="selectpicker"  data-width="25%" name="sizeselect" >
                                            @foreach ( $details as $sizes)                                                   
                                                <option value="{{$sizes->id}}">{{$sizes->catsize}}</option>
                                            @endforeach
                                            </select>
                                    </ul>
                                    
                            @empty($cartamount->amount)
                                <div class="quantity">
                                    <a class="btn minus" onclick='productTextHandler(false,{{$singart->stock}});'><i class="icon_minus-06"></i></a>
                                    <input type="number" title="Qty" value="1" name="quantity" min="1" max="{{$singart->stock}}"step="1" class="form-control qty" text="1" id="quant" onchange='changeValueInput(this,{{$singart->stock}});'>
                                    <a class="btn plus" onclick='productTextHandler(true,{{$singart->stock}});'><i class="icon_plus"></i></a>
                                </div>
                                <div class="add-to-cart">
                                <input class="theme-btn-1 btn cart-btn" type="submit" value="Add to Cart" />
                                </div>
                            @endempty
                        
                        @else

                        @endif
                                                     
                    </div>
                    </form> 
                    <div class="prod-code upper-case">
                        <p> <b>SKU : </b> <b class="black-color">11F25A3678</b> </p>
                        
                    </div>
                </div>
            </div>
            <!-- Products Description Starts --> 
        </div>

        <!-- Products Description Tabination Starts -->  
        <div class="tabs-wrap ptb-70">
            <div class="tabs  text-center">
                <ul id="tabs" class="nav font-2 prod-tabs">                                         
                    <li class="active"><a > Product Description </a></li><br>
                    {{$singart->description}}                 
                </ul>
            </div>
        </div>

        
        @endsection
        @section('js')
            <script src={{asset("js/CartUtils.js")}}></script>   
            <script src={{asset("js/StarHandler.js")}}></script>

        @endsection