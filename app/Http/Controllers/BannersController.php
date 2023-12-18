<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    public function index() {
        $index_banners = Banners::all();
        foreach ($index_banners as $index_banner)
        if(!filter_var($index_banner->image, FILTER_VALIDATE_URL))
        {
            $index_banner->image = url('storage/' . trim($index_banner->image, '/'));
            $index_banner->title_image = url('storage/' . trim($index_banner->title_image, '/'));
        }

        return response()->json($index_banners);
    }

    public function show(int $id) {
        $banner = Banners::query()->where('id', '=', $id)->first();
        if (!filter_var($banner->image, FILTER_VALIDATE_URL))
        {
            $banner->image = url('storage/' . trim($banner->image, '/'));
            $banner->title_image = url('sotrage/', trim($banner->title_image, '/'));
        }
        return response()->json($banner);
    }

    public function showBySection(int $page, int $section) {
        $banner = Banners::query()
            ->where('page', '=', $page)
            ->where('section', '=', $section)
            ->where('status', '=', true)
            ->orderBy('updated_at', 'desc')
            ->first();

        if ($banner == null) {
            return response()->json([
                'message' => 'not found'
            ], 404);
        }

        if (!filter_var($banner->image, FILTER_VALIDATE_URL))
        {
            $banner->image = url('storage/' . trim($banner->image, '/'));
            $banner->title_image = url('sotrage/', trim($banner->title_image, '/'));
        }
        return response()->json($banner);
    }

}
