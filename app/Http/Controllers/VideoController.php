<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use Illuminate\Http\Request;

use App\Http\Requests;

class VideoController extends Controller
{
    private $video;

    public function __construct(Videos $videos)
    {
        $this->video = $videos;
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('client.profile.video.create');
    }

    public function upload(Request $request)
    {

    }

    public function drop($id)
    {

    }
}
