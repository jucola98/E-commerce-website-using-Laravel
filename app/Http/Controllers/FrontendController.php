<?php

namespace App\Http\Controllers;

use App\Category;
use App\Article;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public static function fetchCategoriesMan(){
        $query=Category::all()->where("macrocategory",1);
        return $query;
    }
    public static function fetchCategoriesWoman(){
        $query=Category::all()->where("macrocategory",0);
        return $query;
    }
    public static function getUserCart(){
        $query=null;
        $params=[];
        if(!(Auth::guest())){
            $query=Cart::select("products_id","amount","article.name","article.price","category.id as catid","category.macrocategory as mcat","article.sale")->join("article","cart_content.products_id","=","article.id")->join("category","article.cat_id","=","category.id")->where("cart_content.user_id","=",Auth::user()->id)->limit(2)->get();
            $querytotal=Cart::select("products_id","amount","article.price")->where("cart_content.user_id","=",Auth::user()->id)->join("article","cart_content.products_id","=","article.id")->get();
            $total=0;
            foreach($querytotal as $values){
                $total+=$values->amount*$values->price;
            }
            array_push($params,$query,$total);
        }else{
            array_push($params,null,0);
        }
        return $params;
    }
    public function getMaster(){
        return view('frontend.master');
    }
    public function getContact(){
        return view('frontend.contact');
    }
    public function getProducts(){
        return view('frontend.products');
    }

    public function getCart(){
        return view('frontend.cart');
    }
    public function getSingle(){
        return view('frontend.singleProduct');
    }
    public function getCheckout(){
        return view('frontend.checkout');
    }
    public function searchProduct(Request $request){
        $query=Article::select("article.id","article.name","article.description","article.price","article.URI","article.imgURI","category.name as nomecat","category.name as nomecat","category.id as idcat","category.macrocategory","article.sale","article.price","article.rating","article.stock")->join("category","article.cat_id",'=',"category.id")->where("article.name","like","%".$request->searchbar."%")->orderBy("price","ASC")->paginate(16);
        if($query->isEmpty()){
            return(abort(404));
        }
        return view('frontend.products',["items"=>$query]);
    }
}
