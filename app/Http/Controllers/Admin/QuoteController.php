<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quote;

class QuoteController extends Controller
{
    public function index()
    {
        $items = Quote::where('status', 'quotation')
            ->whereNotNull('user_id')->get();
        return view('admin.quote.index', compact('items'));
    }
}
