@extends('frontend/layout')




@section('content')
            <article class="page-body">
            <!--Breadcrumb Section Start-->
                <section class="breadcrumb-bg-2">                
                    <div class="container">
                        <div class="site-breadcumb">                        
                            <h1 class="title-1">shopping cart</h1> 
                            <ol class="breadcrumb breadcrumb-menubar">
                                <li> <a href="{{ route('master') }}"> Home </a> Shopping Cart </li>                             
                            </ol>
                        </div>  
                    </div>
                </section>
                <!--Breadcrumb Section End-->

                <section class="wrapper sec-space shopping-cart">                  
                    <div class="container">
                        
                        <h2 class="section-title"> your cart items </h2>
                        
                                
                            
                        
                        <!-- Shopping Cart Starts -->
                        <div class="cart-table">
                            <form class="cart-form">
                                <table class="product-table">
                                    <thead class="font-2">
                                        <tr>
                                            <th></th>                                
                                            <th>product name</th>  
                                            <th>price</th> 
                                            <th>quantity</th>
                                            <th>total</th>
                                            <th></th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @isset($dataquery)
                                    @foreach ($dataquery  as $item)    
                                    {{$item}}
                                        <tr>
                                            <td class="image">
                                                <div class="white-bg">
                                                <a class="media-link" href="{{route('singleprod',[$item->mcat,$item->products_id])}}"><img src="{{asset('img/common/recent-prod-1.png')}}" alt=""></a> 
                                                </div>
                                            </td>
                                            <td class="description">
                                                <a href="#">{{$item->name}}</a> 
                                                <ul>
                                                    <li> <i class="arrow_carrot-right"></i> <span>Color :</span> <span class="gray-color">White</span> </li>
                                                    <li> <i class="arrow_carrot-right"></i> <span>Size :</span> <span class="gray-color"> XL </span> </li>
                                                </ul>                                                                                     
                                            </td>    
                                            <td class="price"> ${{number_format($item->price,2)}} </td> 
                                            <td class="quantity">
                                                <div class="qty">
                                                    {{$item->amount}}
                                                </div>
                                            </td>
                                            <td class="price"> ${{number_format($item->price * $item->amount,2)}} </td>
                                            <td class="remove-edit">
                                                <a href="#" class="icon_close fsz-24"></a> 
                                                <a href="#" class="icon_pencil fsz-14"></a> 
                                            </td>
                                        </tr>
                                    @endforeach       
                                    @endisset  
                                    
                                    </tbody>                               
                                </table>
                                <section class="breadcrumb-bg-2-left">                
                                    <div class="container">
                                        <div class="site-breadcumb">                        
                                        <ul class="font-2" >
                                                <li class="title-2 slidetext"> sub total    <span> 
                                                @isset($total)
                                                    ${{number_format($total,2)}}
                                                @endisset
                                                @empty($total)
                                                    $0.00    
                                                @endempty
                                                
                                                </span> </li>
                                                
                                                <li class="title-2 slidetext"> shipping    <span> $7,00 </span> </li>
                                            
                                                <li class="section-title pt-20 slidetext"> <b> grand total  <span class="red-color">@isset($total)
                                                    ${{number_format($total+7,2)}}
                                                @endisset
                                                @empty($total)
                                                    $0.00    
                                                @endempty</span> </b> </li>
                                                <li class="ptb-10"> <hr class="divider"> </li>
                                                <li class="slidetext"> <button class="theme-btn-1 btn submit-btn " type="submit"> <b> proceed to checkout </b> </button> </li>
                                            </ul>
                                        </div>  
                                    </div>
                                </section>
                                <div class="row">
                                    <div class="continue-shopping">
                                        <div class="shp-btn col-sm-8">
                                            <button class="theme-btn btn"> clear shopping cart </button>
                                            <button class="theme-btn btn"> update shopping cart </button>
                                        </div>
                                        <div class="continue-shp col-sm-4">
                                            <button class="theme-btn btn"> continue shopping </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        
                        
                            
                            
                                
                            
                        </div>
                        <!-- / Shopping Cart Ends -->
                    </div>
                  
                </section>

            </article>
            @endsection