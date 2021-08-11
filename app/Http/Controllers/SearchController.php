<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $query_lists = Contact::Paginate(10);
        return view('/search')->with('query_lists',$query_lists);
    }
    public function search(Request $request)
    {
        $fullname = $request->input('fullname');
        $gender = $request->input('gender');
        $created_at_start = $request->input('created_at_start');
        $created_at_end = $request->input('created_at_end');
        $email = $request->input('email');

        $query = Contact::query();

        if (!empty($fullname)) {
            $query->where('fullname','LIKE','%'.$fullname.'%');
        }
        if (!empty($gender)) {
            $query->where('gender','LIKE','%'.$gender.'%');
        }
        if (!empty($created_at_start)&&empty($created_at_end)) {
            $query->where('created_at','LIKE','%'.$created_at_start.'%');
        }
        if (empty($created_at_start)&&!empty($created_at_end)) {
            $query->where('created_at','LIKE','%'.$created_at_end.'%');
        }
        if (!empty($created_at_start)&&!empty($created_at_end)) {
            $query->whereBetween('created_at',[$created_at_start,$created_at_end]);
        }
        if (!empty($email)) {
            $query->where('email','LIKE','%'.$email.'%');
        }

        $query_lists = $query->paginate(10);

        $search_list = array(
            'fullname'=>$fullname,
            'gender'=>$gender,
            'created_at_start' => $created_at_start,
            'created_at_end' => $created_at_end,
            'email'=>$email,
            'query_lists'=>$query_lists,
        );
        return view('search')->with($search_list);
    }
    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/search');
    }
}