<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\BookExport;
use Carbon\Carbon;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $firstDate = $request->input('first_date');
        $lastDate = $request->input('last_date');

        $books = $this->getDataWithConditional($firstDate, $lastDate);
        switch ($request->input('action')) {
            case 'filter':
                $books;
                break;
            case 'export-excel':
                return Excel::download(new BookExport($books->get(), $firstDate, $lastDate, 'excel'), 'books.xlsx');
                break;

            case 'export-pdf':
                $contxt = stream_context_create([
                    'ssl' => [
                        'verify_peer' => FALSE,
                        'verify_peer_name' => FALSE,
                        'allow_self_signed' => TRUE,
                    ]
                ]);

                $data = [
                    "books" => $books->get(),
                    'firstDate' => $firstDate,
                    'lastDate' => $lastDate,
                    'label' => 'pdf',
                ];

                $pdf = PDF::loadView('dashboard.books.export', $data)->setPaper('f4', 'landscape');
                $pdf->getDomPDF()->setHttpContext($contxt);
                return $pdf->download('books.pdf');
                break;
        }
        $data = [
            'rooms' => Room::all(),
            'books' => $books->paginate(5)
        ];

        return view('dashboard.books.index', $data);
    }

    protected function getDataWithConditional($firstDate, $lastDate)
    {
        if ($firstDate !== null && $lastDate !== null) {
            $firstAndLastDate = Book::where('date_start', ">=", $firstDate)->where('date_start', "<=", $lastDate);
            return  $firstAndLastDate;
        } elseif ($firstDate !== null) {
            return Book::where('date_start', ">=", $firstDate);
        } else if ($lastDate !== null) {
            return Book::where('date_start', "<=", $lastDate);
        } else {
            return Book::where('date_start', ">=", date('Y-m-d'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $room_id = $request->get('room_id');

        if ($room_id != null) {
            # code...
            $data = [
                'room' => Room::find($room_id),
                'books' => Book::where('room_id', $room_id)->where('date_start', '>=', date("Y-m-d"))->paginate(5)
            ];
            return view('books.create', $data);
        }
        return redirect('/')->with('status', 'Ruangan Tidak Di pilih, Silahkan pilih ruangan terlebih dahulu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'username' => 'required',
        //     'staff_nip' => 'required',
        //     'installation' => 'required',
        //     'date_start' => 'required',
        //     'time_start' => 'required',
        //     'time_finish' => 'required',
        //     'topic' => 'required',
        //     'entrant' => 'required',
        //     'type_meeting' => 'required',
        //     'room_id' => 'required',
        // ]);
        $bookExist = Book::where('room_id', $request->room_id)->where('date_start', "=", $request->date_start)
            ->whereBetween('time_start', [$request->time_start, date('H:i', strtotime("-1 minutes", strtotime($request->time_finish)))])
            // ->where('time_start', '>=', $request->time_start)
            // ->where('time_finish', '<=', $request->time_finish)
            ->exists();


        if ($bookExist) {
            return redirect('/books/create?room_id=' . $request->room_id)->with('status-error', 'Pengajuan Gagal diajukan, Jadwal bentrok!!');
        } else {
            $rand = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
            $book = new Book;
            $book->username = $request->username;
            $book->staff_nip = $request->staff_nip;
            $book->installation = $request->installation;
            $book->date_start = $request->date_start;
            $book->time_start = $request->time_start;
            $book->time_finish = $request->time_finish;
            $book->topic = $request->topic;
            $book->entrant = $request->entrant;
            $book->type_meeting = $request->type_meeting;
            $book->room_id = $request->room_id;
            $book->approved = false;
            $book->color = $rand;
            $book->save();

            return redirect('/books/create?room_id=' . $request->room_id)->with('status', 'Pengajuan Di ajukan!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show-admin', compact('book'));
    }

    public function show_visitor(Book $book)
    {

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('dashboard.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'approved' => 'required',
        ]);

        $book = Book::find($request->id);

        if ($request->reject_note !== null) {
            $book->reject_note = $request->reject_note;
        }
        $book->approved = $request->approved;
        $book->save();

        return redirect('/dashboard/books')->with('status', 'Data Pengajuan Diubah!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        Book::destroy($book->id);
        return redirect('/dashboard/books')->with('status', 'Data Pengajuan Dihapus!!');
    }
}
