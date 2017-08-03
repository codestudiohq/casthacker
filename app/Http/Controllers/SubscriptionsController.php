<?php

namespace App\Http\Controllers;

use App\Podcast;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store()
    {
        $podcast = Podcast::published()->findOrFail(request('podcast_id'));

        $subscription = Subscription::create([
            'user' => Auth::user(),
            'podcast' => $podcast,
        ]);

        return $subscription;
    }

    public function destroy($id)
    {
        $subscription = Auth::user()->subscriptions()->findOrFail($id);

        $subscription->delete();

        return response('', 204);
    }
}
