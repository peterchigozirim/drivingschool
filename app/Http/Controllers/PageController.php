<?php

namespace App\Http\Controllers;

use App\Models\contactUs;
use App\Models\User;
use Inertia\Inertia;
use App\Models\student;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PageController extends Controller
{
    public function index()
    {
        return Inertia::render('Index');
    }

    public function contactUs(Request $request)
    {
        $add = contactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'message' => $request->message,
        ]);
        if ($add == true) {
            return response()->json([
                'code' => 200,
                'message' => 'We will get back to you Shortly!'
            ]);
        }
        else{
            return response()->json([
                'code' => 500,
                'message' => 'Error in Connection!'
            ]);
        }
    }

    // auth controller

    public function dashboard()
    {   
        $con = contactUs::latest()->get();
        $conCount = contactUs::count();
        $countStudent = student::count();
        $admin = User::count();

        return Inertia::render('Dashboard', ['contact'=>$con, 'contactCount' => $conCount, 'student' => $countStudent, 'admin' => $admin]);

    }

    public function contact()
    {
        $contact = contactUs::latest()->get();
        return Inertia::render('ViewContact', ['contact' => $contact]);
    }

    public function addAdmin()
    {
        return Inertia::render('AddAdmin');
    }

    public function viewAdmin()
    {
        $admin = User::latest()->get();
        return Inertia::render('ViewAdmin', ['admin' => $admin]);
    }

    public function addStudent()
    {
        return Inertia::render('RegisterStudent');
    }

    public function viewStudent()
    {
        $student = student::latest()->get();
        return Inertia::render('Students', ['students' => $student]);
    }

    // register student

    public function regstudent(Request $request)
    {
        if ($request->hasFile('picture')){
            $extArray = ['jpg', 'png', 'jpeg', 'tiff','webp'];
            $image = $request->file('picture');
            $thumbnail = $image->getClientOriginalName();
            $filename = pathinfo($thumbnail, PATHINFO_FILENAME);
            $ext = 'webp';
            $imageToStore = $filename . '_'. time() .'.'. $ext;
            $image_resize = Image::make($image->getRealPath())->encode('webp', 100);
            $image_resize->orientate()->resize(400,  null, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            });
            if (in_array($ext, $extArray)) {
                // $image_resize->save( storage_path('/app/public/counselor/' . $imageToStore ));
                if($image_resize->save(storage_path('/app/public/students/' . $imageToStore )) == true ){
                    if ($addFood = student::create([
                        'firstname' => $request->fname,
                        'lastname' => $request->lname,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'address' => $request->address,
                        'city' => $request->city,
                        'amount' => $request->amount,
                        'state' => $request->state,
                        'country' => $request->country,
                        'datebirth' => $request->dbirth,
                        'days' => $request->days,
                        'picture' => $imageToStore,
                    ])) {
                        return response()->json([
                            'code' => 200,
                            'message' => 'student add successfull'
                        ]);
                        
                    }else{
                        // Could not save user records
                        return response()->json([
                            'code' => 500,
                            'message' => 'Could not save this atudent Records due to an unexpected error!'
                        ]);
                    }
                }else{
                    // Could not upload image
                    return response()->json([
                        'code' => 500,
                        'message' => 'student Image could not be uploaded due to an unexpected error!'
                    ]);
                }
            }else{
                return response()->json([
                    'code' => 500,
                    'message' => 'Invalid Profile Image Selected'
                ]);
            }
        }else{
            // Could not upload image
            return response()->json([
                'code' => 500,
                'message' => 'Please choose a profile picture for food type or change it if you have selected one.'
            ]);
        }
    }

    public function delStudent(Request $request)
    {
        $del = student::where('id', $request->id)->delete();
        if ($del == true) {
            return response()->json([
                'code' => 200,
                'message' => 'student details deleted successful!'
            ]);
        }
    }

    public function delAdmin(Request $request)
    {
        $delete = User::where('id', $request->id)->delete();
        if ($delete == true) {
            return response()->json([
                'code' => 200,
                'message' => 'Admin deleterd successful!'
            ]);
        }
    }
   
}
