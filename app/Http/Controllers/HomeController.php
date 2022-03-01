<?php

namespace App\Http\Controllers;

use Acaronlex\LaravelCalendar\Facades\Calendar;
use App\Models\Book;
use App\Models\Room;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function welcome()
    {
        $books = Book::where('approved', true)->get();
        $book = [];
        foreach ($books as $row) {

            $book[] = Calendar::event(
                $row->topic,
                true,
                $row->date_start,
                $row->date_finish,
                $row->id,
                [
                    'color' => '#' . $row->color,
                    'locale' => 'id',
                    'url' => '/books/' . $row->id
                ]
            );
        }

        $calendar = Calendar::addEvents($book)->setOptions([
            'selectable' => true,
            'displayEventTime' => true,
            'headerToolbar' => [
                'left' => 'prev,next today',
                'center' => 'title',
                'right' => 'dayGridMonth,timeGridWeek'
            ],
        ]);

        $data = [
            'rooms' => Room::all(),
            'books' => Book::where('approved', 1)->where('date_start', '>=', date("Y-m-d"))->orderBy('date_start', 'desc')->paginate(5),
            'calendar' => $calendar
        ];

        return view('books.welcome', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $books = Book::where('approved', true)->get();
        $book = [];
        foreach ($books as $row) {
            $book[] = Calendar::event(
                $row->topic,
                true,
                $row->date_start,
                $row->date_finish,
                $row->id,
                [
                    'color' => '#' . $row->color,
                    'url' => '/dashboard/books/' . $row->id
                ]
            );
        }

        $data = [
            "title" => "Selamat Datang, " . Auth::user()->name,
            "users" => User::count(),
            "roomsCount" => Room::count(),
            "rooms" => Room::all(),
            "books" => $books,
            "calendar" => Calendar::addEvents($book)
                ->setOptions([
                    'selectable' => true,
                    'displayEventTime' => true,
                    'headerToolbar' => [
                        'left' => 'prev,next today',
                        'center' => 'title',
                        'right' => 'dayGridMonth,timeGridWeek'
                    ],
                ]),
            "unapproved" => Book::where('approved', 0)->count(),
            "approved" => Book::where('approved', 1)->count(),
        ];
        return view('dashboard.index', $data);
    }
}
