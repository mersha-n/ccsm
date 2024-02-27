<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function changeLocale($locale)
    {
        // dd(session()->get('locale'));
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
