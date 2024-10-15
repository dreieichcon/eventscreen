<?php

namespace App\Http\Controllers;

use App\Events\ReloadAllEvent;

class ControlScreensController extends Controller
{
    public function force_reload(){
        ReloadAllEvent::dispatch();
        return redirect("/dashboard")->with("success", "Sent Reload to all Screens");
    }
}
