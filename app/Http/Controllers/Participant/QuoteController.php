<?php

namespace App\Http\Controllers\Participant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quote;

class QuoteController extends Controller
{
    public function index()
    {
        $items = Quote::where('user_id', \Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $data = [
            'title' => 'Quotes',
            'quotes' => $items,
        ];

        return view('participant::quotes.index', $data);
    }
}
