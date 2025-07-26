<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Image;
use App\Models\Mechanic;
use App\Models\Post;
use App\Models\State;
use App\Models\Student;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    // all posts by customer
    public function assignCourse($id)
    {
        $id = 1;  // static

        $data = Mechanic::with('owner')->find($id);
        dd($data->owner->owner_name); // lazy loading

        // $student = Student::with('courses')->find($id);  // learn hunter

        // return redirect()->back()->with('success', 'Course assigned successfully');
    }


    // join check
    public function check()
    {
        //posts  1,2,3  // videos 1,2,3

        $data = Video::with('tags')->find(1);

        dd($data);
    }
}
