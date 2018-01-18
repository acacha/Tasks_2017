<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmail;
use App\Mail\CustomEmail;
use Session;
use Illuminate\Support\Facades\Mail;

/**
 * Class EmailController.
 *
 * @package App\Http\Controllers
 */
class EmailController extends Controller
{
    /**
     * Show send email form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('email');
    }

    /**
     * Send email.
     *
     * @param SendEmail $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SendEmail $request)
    {
        Mail::to($request->emailto)->send(new CustomEmail($request->subject,$request->body));

        Session::flash('done', true);

        return back();
    }
}
