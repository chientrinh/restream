<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class RestreamController extends Controller
{
    public $ACCESS_TOKEN;
    public function redirectToProvider()
    {
        $query = http_build_query([
            'response_type' => 'code',
            'client_id' => env('RESTREAM_CLIENT_ID'),
            'redirect_uri' => env('RESTREAM_REDIRECT_URI'),
            'state' => Str::random(40),
        ]);

        return redirect('https://api.restream.io/login?' . $query);
    }

    public function handleProviderCallback(Request $request)
    {
        $response = Http::asForm()->post('https://api.restream.io/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => env('RESTREAM_CLIENT_ID'),
            'client_secret' => env('RESTREAM_CLIENT_SECRET'),
            'redirect_uri' => env('RESTREAM_REDIRECT_URI'),
            'code' => $request->code,
        ]);

        $accessToken = $response->json()['access_token'];

        return redirect('/show-stream?access_token=' . $accessToken)->with('success', 'Logged in with Restream');
    }

    public function getAllPlatforms()
    {
        $accessToken = $this->ACCESS_TOKEN;

        $response = Http::withToken($accessToken)->get('https://api.restream.io/v2/platform/all');

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Unable to fetch platforms'], $response->status());
        }
    }


    public function getStreamKey()
    {
        $accessToken = $this->ACCESS_TOKEN;

        $response = Http::withToken($accessToken)->get('https://api.restream.io/v2/user/streamKey');

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['error' => 'Unable to fetch stream key'], $response->status());
        }
    }

    public function getIngestServer()
    {
        $accessToken = $this->ACCESS_TOKEN;

        $response = Http::withToken($accessToken)->get('https://api.restream.io/v2/user/ingest');

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['error' => 'Unable to fetch ingest server'], $response->status());
        }
    }

    public function getProfile()
    {
        $accessToken = $this->ACCESS_TOKEN;

        $response = Http::withToken($accessToken)->get('https://api.restream.io/v2/user/profile');

        if ($response->successful()) {
            return  $response->json();
        } else {
            return response()->json(['error' => 'Unable to fetch profile'], $response->status());
        }
    }

    public function getChannels()
    {
        $accessToken = $this->ACCESS_TOKEN;

        $response = Http::withToken($accessToken)->get('https://api.restream.io/v2/user/channel/all');

        if ($response->successful()) {
            return  $response->json();
        } else {
            return response()->json(['error' => 'Unable to fetch profile'], $response->status());
        }
    }

    public function getChannel($channelId)
    {
        $accessToken = $this->ACCESS_TOKEN;

        $response = Http::withToken($accessToken)->get('https://api.restream.io/v2/user/channel/' . $channelId);

        if ($response->successful()) {
            return  $response->json();
        } else {
            return response()->json(['error' => 'Unable to fetch profile'], $response->status());
        }
    }

    public function getChannelMeta($channelId)
    {
        $accessToken = $this->ACCESS_TOKEN;

        $response = Http::withToken($accessToken)->get('https://api.restream.io/v2/user/channel-meta/' . $channelId);

        if ($response->successful()) {
            return  $response->json();
        } else {
            return response()->json(['error' => 'Unable to fetch profile'], $response->status());
        }
    }

    public function getChatUrl()
    {
        $accessToken = $this->ACCESS_TOKEN;

        $response = Http::withToken($accessToken)->get('https://api.restream.io/v2/user/webchat/url');

        if ($response->successful()) {
            return  $response->json();
        } else {
            return response()->json(['error' => 'Unable to fetch profile'], $response->status());
        }
    }

    public function getUpcomingEvents()
    {
        $accessToken = $this->ACCESS_TOKEN;

        $response = Http::withToken($accessToken)->get('https://api.restream.io/v2/user/events/upcoming?source=1&scheduled=true');

        if ($response->successful()) {
            return  $response->json();
        } else {
            return response()->json(['error' => 'Unable to fetch profile'], $response->status());
        }
    }

    public function getInProgressEvents()
    {
        $accessToken = $this->ACCESS_TOKEN;

        $response = Http::withToken($accessToken)->get('https://api.restream.io/v2/user/events/in-progress');

        if ($response->successful()) {
            return  $response->json();
        } else {
            return response()->json(['error' => 'Unable to fetch profile'], $response->status());
        }
    }

    public function getEventsHistory()
    {
        $accessToken = $this->ACCESS_TOKEN;

        $response = Http::withToken($accessToken)->get('https://api.restream.io/v2/user/events/history?page=1&limit=10');

        if ($response->successful()) {
            return  $response->json();
        } else {
            return response()->json(['error' => 'Unable to fetch profile'], $response->status());
        }
    }

    public function getEvent($eventId)
    {
        $accessToken = $this->ACCESS_TOKEN;

        $response = Http::withToken($accessToken)->get('https://api.restream.io/v2/user/events/' . $eventId);

        if ($response->successful()) {
            return  $response->json();
        } else {
            return response()->json(['error' => 'Unable to fetch profile'], $response->status());
        }
    }
    public function showStream(Request $request)
    {
        $this->ACCESS_TOKEN = $request->access_token;
        $profile = $this->ACCESS_TOKEN ? $this->getProfile() : null;
        $ingestServer = $this->ACCESS_TOKEN ? $this->getIngestServer() : null;
        $streamKey = $this->ACCESS_TOKEN ? $this->getStreamKey() : null;
        $channels   = $this->ACCESS_TOKEN ? $this->getChannels() : null;
        $channel   = $this->ACCESS_TOKEN ? $this->getChannel($channels[0]['id']) : null;
        $channelMeta   = $this->ACCESS_TOKEN ? $this->getChannelMeta($channels[0]['id']) : null;
        $chatUrl   = $this->ACCESS_TOKEN ? $this->getChatUrl() : null;
        $upcomingEvents   = $this->ACCESS_TOKEN ? $this->getUpcomingEvents() : null;
        $inProgressEvents   = $this->ACCESS_TOKEN ? $this->getInProgressEvents() : null;
        $eventsHistory   = $this->ACCESS_TOKEN ? $this->getEventsHistory() : null;
        $event   = $this->ACCESS_TOKEN ? $this->getEvent($eventsHistory['items'][0]['id']) : null;

        return view('stream/stream-io', [
            'profile' => json_encode($profile),
            'ingestServer' => json_encode($ingestServer),
            'streamKey' => json_encode($streamKey),
            'channels' => json_encode($channels),
            'channel' => json_encode($channel),
            'channelMeta' => json_encode($channelMeta),
            'chatUrl' => json_encode($chatUrl),
            'upcomingEvents' => json_encode($upcomingEvents),
            'inProgressEvents' => json_encode($inProgressEvents),
            'eventsHistory' => json_encode($eventsHistory),
            'event' => json_encode($event),
            'accessToken' => $this->ACCESS_TOKEN,
        ]);
    }
}
