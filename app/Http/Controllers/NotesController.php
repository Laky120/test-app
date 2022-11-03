<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use App\Repositories\NotesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class NotesController extends Controller
{
    private NotesRepository $repository;

    public function __construct(NotesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @OA\Get(
     *     path="/",
     *     summary="Get list of notes",
     *     tags={"Notes"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     )
     * )
     */
    public function home()
    {
        $notes = Notes::paginate(5);
        return view('home', compact('notes'));
    }

    /**
     * @OA\Get(
     *     path="/create",
     *     summary="Page for create new notes",
     *     tags={"Notes"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     )
     * )
     */
    public function create()
    {
        return view('create');
    }

    /**
     * @OA\Get(
     *     path="/find",
     *     summary="Page for find notes",
     *     tags={"Notes"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     )
     * )
     */
    public function find()
    {
        return view('find');
    }

    /**
     * @OA\Post(
     *     path="/create/check",
     *     summary="Create new notes",
     *     tags={"Notes"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     )
     * )
     */
    public function create_check(Request $request)
    {
        $valid = $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $photo = '';
        if ($_FILES && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
            $photo = $_FILES["photo"]["name"];
            move_uploaded_file($_FILES["photo"]["tmp_name"], $photo);
        }

        $this->repository->create([
            'full_name' => $request->input('full_name'),
            'company' => $request->input('company'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'birthday' => $request->input('birthday'),
            'photo' => $photo,
        ]);

        $message = 'Запись была успешно создана';
        return view('create', ['message' => $message]);
    }

    /**
     * @OA\Post(
     *     path="/find/check",
     *     summary="Find notes",
     *     tags={"Notes"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     )
     * )
     */
    public function find_check(Request $request)
    {
        if ($request->input('number')) {

            $number = $request->input('number');
            $products = DB::table('notes')->get()->where('id', $number);

            if (count($products) != 0) {
                return view('find', ['number' => $number, 'products' => $products]);
            } else {
                $message = 'Не существует записей с номером ' . $number;
                return view('find', ['message' => $message]);
            }
        } else {
            return redirect('/');
        }
    }

    /**
     * @OA\Post(
     *     path="/delete/check",
     *     summary="Delete notes",
     *     tags={"Notes"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     )
     * )
     */
    public function delete_check(Request $request)
    {

        $this->repository->delete([
            $request->input('number'),
        ]);

        return redirect('/');
    }

    /**
     * @OA\Get(
     *     path="/update",
     *     summary="Page for update notes",
     *     tags={"Notes"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     )
     * )
     */
    public function update(Request $request)
    {
        $data = array(
            'note_id' => $request->input('note_id'),
            'full_name' => $request->input('full_name'),
            'company' => $request->input('company'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'birthday' => $request->input('birthday'),
            'photo' => $request->input('photo'),
        );
        return view('/update', compact('data'));
    }

    /**
     * @OA\Get(
     *     path="/update/check",
     *     summary="Update notes",
     *     tags={"Notes"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     )
     * )
     */
    public function update_check(Request $request)
    {
        $valid = $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $photo = $request->input('photo');
        if ($_FILES) {
            if ($_FILES["photo_new"]["error"] == UPLOAD_ERR_OK) {
                $photo = $_FILES["photo_new"]["name"];
                move_uploaded_file($_FILES["photo_new"]["tmp_name"], $photo);
            }
        }

        $id = $_GET['id'];

        $this->repository->update([
            'id' => $id,
            'full_name' => $request->input('full_name'),
            'company' => $request->input('company'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'birthday' => $request->input('birthday'),
            'photo' => $photo,
        ]);

        return redirect('/');
    }
}
