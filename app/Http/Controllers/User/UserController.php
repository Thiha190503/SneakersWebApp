<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // user home page
    public function home(){
        $products = Product::when(request('key'), function ($query) {
            $query->where('name', 'like', '%' . request('key') . '%');
        })
        ->orderBy('created_at', 'desc')
        ->paginate(12);
        $products->appends(request()->all());

        $categories = Category::get();
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $history = Order::where('user_id', Auth::user()->id)->get();
        return view('user.main.home', compact('products', 'categories','cart','history'));

    }

    // contact
    public function contact(){
        return view('user.main.contact');
    }

    // contact
    public function showHomePage(){
        return view('user.main.showHomePage');
    }

    // contact message
    public function contactMessage(Request $request) {
        $this->contactValidationCheck($request);
        $data = $this->getContactData($request);
        Contact::create($data);
        return back()->with(['contactSuccess' => 'Your Message is Succeeded.Thank you!']);
    }

    // contact validation check
    private function contactValidationCheck($request)
    {
        Validator::make($request->all(), [
            'contactName' => 'required',
            'contactEmail' => 'required',
            'contactMessage' => 'required',
        ])->validate();
    }


    // get contact data
    private function getContactData($request)
    {
        return [
            'name' => $request->contactName,
            'email' => $request->contactEmail,
            'message' => $request->contactMessage,
            'created_at' => Carbon::now(),
        ];
    }

    public function userList() {
        $users = User::when(request('key'), function ($query) {
            $query->where(function($q) {
                $q->orWhere('name', 'like', '%' . request('key') . '%');
                $q->orWhere('email', 'like', '%' . request('key') . '%');
                $q->orWhere('gender', 'like', '%' . request('key') . '%');
                $q->orWhere('address', 'like', '%' . request('key') . '%');
            });
        })
        ->where('role', 'user')
        ->orderBy('id', 'desc')
        ->paginate(5);
        $users->appends(request()->all());
        return view('admin.user.list', compact('users'));
    }

    // cart list
    public function cartList()
    {
        $cartList = Cart::select('carts.*', 'products.id as product_id', 'products.name as product_name', 'products.price as product_price', 'products.image as product_image')
            ->leftJoin('products', 'products.id', 'carts.product_id')
            ->where('user_id', Auth::user()->id)
            ->get();

        $totalPrice = 0;

        foreach ($cartList as $c) {
            $totalPrice += $c->product_price * $c->qty;
        }
        return view('user.main.cart', compact('cartList', 'totalPrice'));
    }

    // user details
    public function userDetails($id)
    {
        $userData = User::where('id',$id)->first();
        return view('admin.user.details', compact('userData'));
    }

    // change user role
    public function userChangeRole(Request $request) {
        $updateSource = [
            'role' => $request->role,
        ];

        User::where('id',$request->userId)->update($updateSource);
    }

    // change password page
    public function changePasswordPage()
    {
        return view('user.password.change');
    }

    // change password
    public function changePassword(Request $request)
    {
        $this->passwordValidationCheck($request);

        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $dbHashValue = $user->password; // hash value

        if (Hash::check($request->oldPassword, $dbHashValue)) {
            $data = [
                'password' => Hash::make($request->newPassword)
            ];
            User::where('id', Auth::user()->id)->update($data);

            return back()->with(['changeSuccess' => 'Password Change Success...']);
        }
        return back()->with(['notMatch' => 'The Old Password not match.Try again!']);
    }

    // user account change page
    public function accountChangePage()
    {
        return view('user.profile.account');
    }

    // user account change
    public function accountChange($id, Request $request)
    {
        $this->accountValidationCheck($request);
        $data = $this->getUserData($request);

        // for image
        if ($request->hasFile('image')) {
            $dbImage = User::where('id', $id)->first();
            $dbImage = $dbImage->image;

            if ($dbImage != null) {
                Storage::delete('public/' . $dbImage);
            }

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }

        User::where('id', $id)->update($data);
        return back()->with(['updateSuccess' => 'Admin Account Updated...']);
    }

    //  filter product
    public function filter($categoryId) {
        $products = Product::where('category_id',$categoryId)->orderBy('created_at','desc')->get();
        $categories = Category::get();
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $history = Order::where('user_id', Auth::user()->id)->get();
        return view('user.main.home', compact('products', 'categories','cart','history'));
    }

    // direct product details
    public function productDetails($productId)
    {
        $product = Product::where('id', $productId)->first();
        $productList = Product::get();
        return view('user.main.details', compact('product', 'productList'));
    }

    // request history page
    public function history() {
        $order = Order::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(6);
        return view('user.main.history',compact('order'));
    }

    //  user delete
    public function userDelete($id) {
        User::where('id', $id)->delete();
        return back()->with(['deleteSuccess' => 'User is deleted!']);
    }

    //  get user data
    private function getUserData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now(),
        ];
    }

    // account validation check
    private function accountValidationCheck($request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp|file',
            'address' => 'required',
        ])->validate();
    }

    // password validation check
    private function passwordValidationCheck($request)
    {
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|min:6|same:newPassword',
        ])->validate();
    }

}
