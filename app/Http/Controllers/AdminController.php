<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;


class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');

    }
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function AdminLogin()
    {
        return view('admin.admin_login');
    }
    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin_profile_view', compact('profileData'));
    }


    // private function getWeather($city)
    // {
    //     $apiKey = '3c53eef123e7c5f775e8cc644ab7c6d0';
    //     $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

    //     try {
    //         $response = Http::get($apiUrl);

    //         if ($response->ok()) {
    //             $data = $response->json();

    //             return [
    //                 'temperature' => $data['main']['temp'],
    //                 'description' => $data['weather'][0]['description'],
    //                 'icon' => $data['weather'][0]['icon'],
    //             ];
    //         } else {
    //             return [
    //                 'temperature' => 'N/A',
    //                 'description' => 'Unable to fetch weather',
    //                 'icon' => null,
    //             ];
    //         }
    //     } catch (\Exception $e) {
    //         return [
    //             'temperature' => 'N/A',
    //             'description' => 'Unable to fetch weather',
    //             'icon' => null,
    //         ];
    //     }
    // }


    // private function getWeather($city)
    // {
    //     $apiKey = '3c53eef123e7c5f775e8cc644ab7c6d0';
    //     $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

    //     try {
    //         $response = Http::get($apiUrl);

    //         if ($response->ok()) {
    //             $data = $response->json();


    //             $sunrise = isset($data['sys']['sunrise']) ? date('H:i:s', $data['sys']['sunrise']) : 'N/A';
    //             $sunset = isset($data['sys']['sunset']) ? date('H:i:s', $data['sys']['sunset']) : 'N/A';


    //             $rain = isset($data['rain']) ? $data['rain']['1h'] . ' mm' : 'N/A';

    //             return [
    //                 'temperature' => $data['main']['temp'],
    //                 'description' => $data['weather'][0]['description'],
    //                 'icon' => $data['weather'][0]['icon'],
    //                 'sunrise' => $sunrise,
    //                 'sunset' => $sunset,
    //                 'cityName' => $data['name'],
    //                 'rain' => $rain,
    //             ];
    //         } else {
    //             return [
    //                 'temperature' => 'N/A',
    //                 'description' => 'Unable to fetch weather',
    //                 'icon' => null,
    //                 'sunrise' => 'N/A',
    //                 'sunset' => 'N/A',
    //                 'cityName' => 'City not found',
    //                 'rain' => 'N/A',
    //             ];
    //         }
    //     } catch (\Exception $e) {
    //         return [
    //             'temperature' => 'N/A',
    //             'description' => 'Unable to fetch weather',
    //             'icon' => null,
    //             'sunrise' => 'N/A',
    //             'sunset' => 'N/A',
    //             'cityName' => 'N/A',
    //             'rain' => 'N/A',
    //         ];
    //     }
    // }


    public function AdminProfileStore(Request $request)
    {
        // Get the authenticated user's ID
        $id = Auth::user()->id;

        // Define validation rules
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|digits:3',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);
        // Update user details
        $user->username = $data['username'];
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        $user->city = $data['city'];
        if ($request->file('photo')) {
            // Delete the old photo if it exists
            if ($user->photo && file_exists(public_path('upload/admin_images/' . $user->photo))) {
                unlink(public_path('upload/admin_images/' . $user->photo));
            }

            $file = $request->file('photo');
            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('upload/admin_images/' . $name_gen);

            // Resize image
            list($width, $height) = getimagesize($file);
            $newWidth = 370;
            $newHeight = 246;
            $source = imagecreatefromstring(file_get_contents($file));
            $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

            // Preserve transparency if PNG
            if ($file->getClientOriginalExtension() === 'png') {
                imagesavealpha($resizedImage, true);
                $color = imagecolorallocatealpha($resizedImage, 0, 0, 0, 127);
                imagefill($resizedImage, 0, 0, $color);
            }

            imagecopyresampled($resizedImage, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

            // Save the resized image
            if ($file->getClientOriginalExtension() === 'jpg' || $file->getClientOriginalExtension() === 'jpeg') {
                imagejpeg($resizedImage, $destinationPath, 80);
            } elseif ($file->getClientOriginalExtension() === 'png') {
                imagepng($resizedImage, $destinationPath, 8);
            }

            imagedestroy($source);
            imagedestroy($resizedImage);

            $user->photo = $name_gen;  // Update photo field in the database
        }

        $user->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /*public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;  //requested data or data which we have given will be sent to the database 

        if ($request->file('photo')) {
            $manager = new ImageManager(new driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('photo')->getClientOriginalExtension();
            $img = $manager->read($request->file('photo'));
            $img = $img->resize(370, 246);
            $img->toJpeg(80)->save(base_path('public/upload/admin_images/' . $name_gen));
            //$save_url='upload/admin_images/'.$name_gen;
            $data['photo'] = $name_gen;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        /* if ($request->file('photo')) {
             $file = $request->file('photo');
             @unlink(public_path('upload/admin_images/' . $data->photo));
             $filename = date('YmdHi') . $file->getClientOriginalName();//it takes only exetension of the file 
             $file->move(public_path('upload/admin_images'), $filename);
             $data['photo'] = $filename;
         }
         $data->save();
         $notification = array(
             'message' => 'Admin Profile Updated Succesfully',
             'alert-type' => 'success'
         );

         return redirect()->back()->with($notification);*/

    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    }
    public function AdminUpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        //Match the old password

        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = array(
                'message' => 'Old Password Does Not Match',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        //update new pasword
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Password change Succesfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    //admin user all method

    public function AllAdmin()
    {

        $alladmin = User::where('role', 'admin')->get();
        return view('backend.pages.admin.all_admin', compact('alladmin'));
    }

    public function AddAdmin()
    {


        $roles = Role::all();
        return view('backend.pages.admin.add_admin', compact('roles'));

    }

    public function StoreAdmin(Request $request)
    {


        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'New Admin User inserted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);

    }

    public function EditAdmin($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.pages.admin.edit_admin', compact('user', 'roles'));
    }
    public function UpdateAdmin(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'New Admin User Updated Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);

    }
    public function DeleteAdmin($id)
    {
        $user = User::findOrFail($id);
        if (!is_null($user)) {
            $user->delete();
        }
        $notification = array(
            'message' => 'New Admin User Deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }
}
