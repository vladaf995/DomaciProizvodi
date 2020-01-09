<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Conversation;
use App\User;

class MessageController extends Controller
{


    public function index()
    {
        $product = Product::where('user_id', auth()->user()->id)->get();
        foreach ($product as $p) {
            $conversation = Conversation::where('product_id', $p->id)->get();
        }
        foreach($conversation as $c){
            if($c->sender_id != auth()->user()->id){
                $sender = User::where('id', $c->sender_id)->get();
            }
        }
        return view('message.index', compact('product', 'sender'));
    }

    public function show(Product $product){
    $conversation = Conversation::where('product_id', $product->id)->where('sender_id', auth()->user()->id)->where('recipient_id', $product->user_id)->get();

    $user2 = $product->user_id;

        return view('message.message_show', ['product'=>$product], compact('conversation', 'user2'));
    }


    public  function store_message(Request $request, Product $product){
           $conv = Conversation::where('product_id', $product->id)->first();
           $data['message'] = request('message');
           $data['product_id'] = $product->id;
           $data['sender_id'] = auth()->user()->id;
           $data['recipient_id'] = $product->user_id;
                Conversation::create($data);
    }


}
