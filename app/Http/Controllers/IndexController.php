<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tour;
use App\Models\Gallery;
use App\Models\Schedule;

class IndexController extends Controller
{

    public function index()
    {
        $cate = [];
        $category_parent = Category::with('tour')->where('category_parent', '!=', 0)->get();
        foreach ($category_parent as $key => $cate_parent) {
            $cate[] = $cate_parent->id;
        }
        $list_tour = Tour::with('category')->whereIn('category_id', $cate)->orderBy('id', 'DESC')->get();
        $category = Category::with('tour')->where('category_parent', 0)->orderBy('id', 'DESC')->get();
        //print_r($tour);
        return view('pages.home', compact('category', 'list_tour'));
    }
    public function tour($slug)
    {
        $category_by_slug = Category::where('slug', $slug)->first();
        $list_tour = Tour::with('category')->where('category_id', $category_by_slug->id)->orderBy('id', 'DESC')->paginate(8);
        return view('pages.tour', compact('list_tour', 'category_by_slug'));
    }
    public function detail_tour($slug)
    {
        $tour = Tour::with('category')->where('slug', $slug)->first();

        $galleries = Gallery::where('tour_id', $tour->id)->get();
        $related_tour = Tour::where('category_id', $tour->category_id)
            ->whereNotIn('id', [$tour->id])
            ->orderBy('id', 'DESC')
            ->get();
        $schedules = Schedule::where('tour_id', $tour->id)->first();

        return view('pages.detail_tour', compact('tour', 'galleries', 'related_tour', 'schedules'));
    }
}
