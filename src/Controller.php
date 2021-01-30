<?php
namespace Pers0n4\XePlugin\Message;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Facades\XeUser;
use App\Http\Controllers\Controller as BaseController;
use XeFrontend;
use XePresenter;
use Pers0n4\XePlugin\Message\Models\Message;

class Controller extends BaseController
{
    public function index()
    {
        XeFrontend::css(Plugin::asset('assets/css/main.css'))->load();

        $messages = Message::where('receiver_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return XePresenter::make('message::views.index', [
            'messages' => $messages,
        ]);
    }

    public function create(Request $request)
    {
        XeFrontend::css(Plugin::asset('assets/css/main.css'))->load();

        $receiver = XeUser::findOrFail($request->receiver_id);

        return XePresenter::make('message::views.create', [
            'receiver' => $receiver,
        ]);
    }

    public function store(Request $request)
    {
        $message = new Message();

        $message->sender_id = Auth::id();
        $message->receiver_id = $request->receiver;
        $message->content = $request->content;

        $message->save();

        return redirect()->route('message::index')->with('success', 'Sent successfully');
    }

    public function show($id)
    {
        XeFrontend::css(Plugin::asset('assets/css/main.css'))->load();

        $message = Message::findOrFail($id);
        if (!$message->is_read) {
            $message->is_read = !$message->is_read;
            $message->save();
        }

        return XePresenter::make('message::views.show', [
            'message' => $message,
        ]);
    }
}
