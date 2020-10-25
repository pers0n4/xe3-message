<?php
namespace Pers0n4\XePlugin\Message;

use Illuminate\Support\Facades\Auth;
use XeFrontend;
use XePresenter;
use App\Http\Controllers\Controller as BaseController;
use Pers0n4\XePlugin\Message\Models\Message;

class Controller extends BaseController
{
    public function index()
    {
        XeFrontend::css(Plugin::asset('assets/css/main.css'))->load();

        $messages = Message::where('receiver_id', Auth::id())->get();

        return XePresenter::make('message::views.index', [
            'messages' => $messages,
        ]);
    }
}
