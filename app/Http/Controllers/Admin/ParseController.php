<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\ParseDishes;
use App\Models\ParserHistory;
use Illuminate\Http\RedirectResponse;

class ParseController
{
    public function __invoke(): RedirectResponse
    {
        $history = ParserHistory::latest()->first();
        if ($history)
            if ($history->status === ParserHistory::IN_PROGRESS)
                return redirect()->back();

        ParserHistory::create();

        ParseDishes::dispatch();
        return redirect()->back();
    }
}
