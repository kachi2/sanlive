<?php

namespace App\Http\Controllers\Users;

use App\Events\OrderShipment;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\CreateShipment;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Vinkla\Hashids\Facades\Hashids;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index()
    {

        return inertia('Users/Accounts/account', [
            'address' => ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->first(),
            'account' => User::where('id', auth_user()->id)->first(),
            'pageMeta' => [
                'url' => url()->current(),
                'title' => 'My Account ',
                'metaTitle' => 'eMedicStore: The largest and biggest online pharmacy marketplace that you can trust.',
                'description' => 'Order | History',
                'keywords' => 'buy medicine in nigeria, buy drugs in lagos, medical wholesales, medical retailers, buy prescribed drugs',
                'image_url' => websiteLogo()
                ]
        ]);
    }

    public function Orders()
    {
        $orders = DB::table('orders')->join('cart_items', 'orders.order_no', '=', 'cart_items.Order_no')
            ->where('orders.user_id', auth_user()->id)
            ->orderBy('orders.created_at', 'DESC')
            ->get();
        addHashId($orders);

        return inertia('Users/Accounts/orders',
        [
            'orders' =>  $orders,
            'pageMeta' => [
                'url' => url()->current(),
                'title' => 'Orders ',
                'metaTitle' => 'Buy medical products, order fast, get fast delivery',
                'description' => 'Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices',
                'keywords' => 'buy medicine in nigeria, buy drugs in lagos, medical wholesales, medical retailers, buy prescribed drugs',
                'image_url' => websiteLogo()
            ]
        ]);
    }

    public function OrderDetails($order_no)
    {
        $orders = Order::where('order_no', $order_no)->first();
        if(!isset($orders)){
            Session::flash('alert', 'error');
            Session::flash('msg', 'An error occured fetching order details');
            return back();
        }
        $order_items = CartItem::where('Order_no', $order_no)->get();
        $shipping = ShippingAddress::where('id', $orders->address_id)->first();
        $delivery = CreateShipment::where('order_id', $order_no)->first();
        return inertia('Users/Accounts/orderDetails', [
            'orders' => $orders,
            'order_items' => $order_items,
            'shipping' => $shipping,
            'delivery' => $delivery,
            'pageMeta' => [
                'url' => url()->current(),
                'title' => 'Order Details ',
                'metaTitle' => 'Buy medical products, order fast, get fast delivery',
                'description' => 'Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices',
                'keywords' => 'buy medicine in nigeria, buy drugs in lagos, medical wholesales, medical retailers, buy prescribed drugs',
                'image_url' => websiteLogo()
            ]
        ]);
    }

    public function Addresses()
    {
        $address = ShippingAddress::where('user_id', auth_user()->id)->get();
        addHashId($address);
        return inertia('Users/Accounts/address', [
            'addresses' => $address,
            'pageMeta' => [
                'url' => url()->current(),
                'title' => 'Address',
                'metaTitle' => 'Buy medical products, order fast, get fast delivery',
                'description' => 'Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices',
                'keywords' => 'buy medicine in nigeria, buy drugs in lagos, medical wholesales, medical retailers, buy prescribed drugs',
                'image_url' => websiteLogo()
            ]
        ]);
    }

    public function EditAddress($id)
    {
        $id = Hashids::connection('products')->decode($id);
        $address = ShippingAddress::where('id', $id)->first();
        $address->hashid = Hashids::connection('products')->encode($address->id);
      
        return inertia('Users/Accounts/editAddress', [
            'address' => $address,
            'pageMeta' => [
                'url' => url()->current(),
                'title' => 'Edit Address ',
                'metaTitle' => 'Buy medical products, order fast, get fast delivery',
                'description' => 'Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices',
                'keywords' => 'buy medicine in nigeria, buy drugs in lagos, medical wholesales, medical retailers, buy prescribed drugs',
                'image_url' => websiteLogo()
            ]
        ]);
    }

    public function UpdateAddress(Request $req, $id)
    {
        $id = Hashids::connection('products')->decode($id);
        $data = [
            'user_id' => auth_user()->id,
            'name' => $req->name,
            'phone' => $req->phone,
            'email' => $req->email,
            'address' => $req->address,
            'is_default' => $req->is_default ?? '0',
        ];

        if ($req->is_default) {
            ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->update(['is_default' => 0]);
        }

        $address = ShippingAddress::where('id', $id)->first();
        $address->fill($data)->save();
        $check = ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->first();
        if (!isset($check)) {
            ShippingAddress::where(['user_id' => auth_user()->id, 'id' =>  $id])->update(['is_default' => 1]);
        }
        Session::flash('success', 'Address Updated Successfully');
        return back();
    }

    public function CreateAddress()
    {
        return inertia('Users/Accounts/createAddress', [
            'pageMeta' => [
                'url' => url()->current(),
                'title' => 'Create Address ',
                'metaTitle' => 'Buy medical products, order fast, get fast delivery',
                'description' => 'Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices',
                'keywords' => 'buy medicine in nigeria, buy drugs in lagos, medical wholesales, medical retailers, buy prescribed drugs',
                'image_url' => websiteLogo()
            ]
        ]);
    }

    public function storeAddress(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required'
        ]);
        if ($valid->fails()) {
            return back()->withInput($req->all())->withErrors($valid);
        }
        if ($req->is_default == 1) {
            ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->update(['is_default' => 0]);
        }
        $data = [
            'user_id' => auth_user()->id,
            'name' => $req->name,
            'phone' => $req->phone,
            'address' => $req->address,
            'is_default' => $req->is_default ?? 0
        ];
        ShippingAddress::create($data);
        Session::flash('success', 'Address Added successfully');
        return redirect()->intended(route('users.account.address'));
    }

    public function AddressDelete($id)
    {
       
      
        $id = Hashids::connection('products')->decode($id);
        $check = ShippingAddress::where(['user_id' => auth_user()->id])->get();
        if (count($check) > 1) {
            $address = ShippingAddress::where(['user_id' => auth_user()->id, 'id' => $id])->first();
            $address->delete();
            Session::flash('alert', 'error');
            Session::flash('msg', 'Address Deleted from Address Book');
            return back();
        } else {
            Session::flash('alert', 'error');
            Session::flash('msg', 'You Must have atleat One Address in your Address Book');
            return back();
        }
        return back();
    }

    public function recentViews()
    {
        $products = session()->get('products.recently_viewed');
        if (is_array($products)) {
            $data = array_unique($products);
            $datas = array_slice($data, -10, 10, true);
            $products['recent'] = Product::whereIn('id', $datas)->take(10)->latest()->get();
            addHashId($products['recent']);
        } else {
            $products['recent'] = [];
        }
        return inertia('Users/Accounts/recentViewed',
        ['recent' => $products,
        'pageMeta' => [
            'url' => url()->current(),
            'title' => 'Recent Viewed ',
            'metaTitle' => 'Buy medical products, order fast, get fast delivery',
            'description' => 'Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices',
            'keywords' => 'buy medicine in nigeria, buy drugs in lagos, medical wholesales, medical retailers, buy prescribed drugs',
            'image_url' => websiteLogo()
        ]]);
    }

    public function OrderPayments()
    {
        return inertia('Users/Accounts/payments',[
            'payments' => Payment::where('user_id', auth_user()->id)->get(),
            'pageMeta' => [
                'url' => url()->current(),
                'title' => 'Payment',
                'metaTitle' => 'Buy medical products, order fast, get fast delivery',
                'description' => 'Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices',
                'keywords' => 'buy medicine in nigeria, buy drugs in lagos, medical wholesales, medical retailers, buy prescribed drugs',
                'image_url' => websiteLogo()
            ]
        ]);
    }


    public function AccountSettings()
    {
        return inertia('Users/Accounts/settings',
            ['user' => User::where('id', auth_user()->id)->first(),
            'pageMeta' => [
                'url' => url()->current(),
                'title' => 'Settings ',
                'metaTitle' => 'Buy medical products, order fast, get fast delivery',
                'description' => 'Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices',
                'keywords' => 'buy medicine in nigeria, buy drugs in lagos, medical wholesales, medical retailers, buy prescribed drugs',
                'image_url' => websiteLogo()
            ]
    ]);
    }

    public function UpdateAccountSettings(Request $req)
    {
        $user = User::whereId(auth_user()->id)->first();

        if(isset($req->first_name)){
            $data['first_name'] = $req->first_name;
        }
        if(isset($req->last_name)){
            $data['last_name'] = $req->last_name;
        }
        if(isset($req->email)){
            $data['email'] = $req->email;
        }
        if(isset($req->phone)){
            $data['phone'] = $req->phone;
        }
        if(isset($req->password)){
            if(Hash::check($req->oldpassword , auth_user()->password)){
                $data['password'] = Hash::make($req->password);
            }else{
                Session::flash('error', 'Old password is incorrect');
                return back();
            }
        }if(isset($req->city)){
            $data['city'] = $req->city;
        }
        if(isset($req->state)){
            $data['state'] = $req->state;
        }
        if(isset($req->country)){
            $data['country'] = $req->country;
        }

      $user->fill($data)->save();
      Session::flash('success', 'Account Updated successfully');
      return back();
    }
}
