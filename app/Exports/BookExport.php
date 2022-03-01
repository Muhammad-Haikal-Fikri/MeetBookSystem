<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BookExport implements FromView
{
    public function __construct($books, $firstDate, $lastDate, $label)
    {
        $this->books = $books;
        $this->firstDate = $firstDate;
        $this->lastDate = $lastDate;
        $this->label = $label;
    }

    public function view(): View
    {
        $data = [
            'books' => $this->books,
            'firstDate' => $this->firstDate,
            'lastDate' => $this->lastDate,
            'label' => $this->label,
        ];

        return view('dashboard.books.export', $data);
    }
}
