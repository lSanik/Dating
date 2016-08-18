<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Models\Album;
use App\Models\Images;
use App\Services\ExpenseService;
use Carbon\Carbon;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AlbumController extends Controller
{
    /**
     * @var ExpenseService
     */
    private $expensesService;

    /**
     * AlbumController constructor.
     * @param ExpenseService $expenseService
     */
    public function __construct(ExpenseService $expenseService)
    {
        $this->expensesService = $expenseService;
    }

    public function show($id, $aid)
    {
        if(\Auth::user()->hasRole('male')) {

            if (!$this->expensesService->checkExpense(\Auth::user()->id, $id, Constants::EXP_ALBUM)) {
                if (!(
                    (float) $this->getMoney() >= (float) $this->expensesService->getCost(Constants::EXP_ALBUM)
                )){
                    \Session::flash('message', 'Enough Love Coins!');
                    return back();
                }
                ///todo : review logic
                $this->expensesService->setExpense(
                    \Auth::user()->id,
                    $id,
                    Constants::EXP_ALBUM,
                    $this->expensesService->getCost(Constants::EXP_ALBUM),
                    Carbon::now()->addWeek()
                );

            }
        }

        $photos = Images::where('album_id', '=', $aid)->get();

        return view('client.profile.albums.show')->with([
            'photos' => $photos,
            'id'     => $id
        ]);
    }

    /**
     * Create new album
     *
     * @param int $id
     * @return mixed
     */
    public function create(int $id)
    {
        return view('client.profile.albums.create');
    }

    /**
     * Create and store new album with photos
     *
     * @param Request $request
     * @param $id
     * @return Redirect
     */
    public function make(Request $request, $id)
    {
        /**
         * Make new Album
         */
        $album = new Album();
        $album->name          = $request->input('name');
        $album->cover_image   = $this->upload($request->file('cover_image'));
        $album->user_id       = $id;
        $album->save();

        /**
         * Load photos
         */

        foreach ($request->allFiles()['files'] as $file) {
            $image = new Images();
            $image->album_id = $album->id;
            $image->image = $this->upload($file);
            $image->save();
        }

        return redirect('/'.\App::getLocale().'/profile/'.$id.'/photo');
    }

    /**
     * Drop photo
     *
     * @param Request $request
     * @return 
     */
    public function dropImage(Request $request)
    {
        $image = Images::find($request->input('id'));
        $this->removeFile('/uploads/'.$image->image);

        Images::destroy($request->input('id'));
        return response('success', 200);
    }

    /**
     * Drop album & files
     *
     * @param Request $request
     * @return mixed
     */
    public function drop(Request $request)
    {
        $images = Images::where('album_id', '=', $request->input('id'));
        foreach ($images as $i){
            $this->removeFile('/uploads/'.$i->image);
        }

        Album::destroy($request->input('id'));
        return response('success', 200);
    }
}
