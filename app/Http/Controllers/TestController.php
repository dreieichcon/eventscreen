<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;
use App\Jobs\TestJob;

class TestController extends Controller
{
    public function index()
    {

    }

    public function fire_event()
    {
        $user = auth()->user();
       // TestJob::dispatch();
        TestEvent::dispatch("Hallooooo");
        return redirect("/");
    }
}
