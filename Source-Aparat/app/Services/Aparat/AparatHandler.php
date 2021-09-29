<?php

namespace App\Services\Aparat;

use App\Exceptions\CannotGetFormActionException;
use App\Exceptions\CannotGetTokenException;
use App\Exceptions\VideoNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class AparatHandler
{
    private Http $http;
    private $user;
    const TOKEN_EXPIRE_TIME = 1200;

    public function __construct(Http $http)
    {
        $this->http = $http;
        $this->user = config('aparat.user');
    }

    public function mostViewedVideos()
    {
        $url = config('aparat.mostViewedVideosUrl');

        $response = $this->http::get($url);

        return $response->json('mostviewedvideos');
    }

    public function login()
    {
        $password = config('aparat.password');
        $url = config('aparat.loginUrl');
        $url = $this->replaceParams($url, [
            'user' => $this->user,
            'password' => $password
        ]);
        $response = $this->http::get($url);
        return $response->json('login');
    }

    public function upload(string $filename, string $title, int $category)
    {
        $formAction = $this->getUploadForm();

        $formActionUrl = $formAction['formAction'];
        $formId = $formAction['frm-id'];

        $uploadResponse = $this->http::attach(
            'video', file_get_contents(Storage::disk('public')->path($filename)), $filename
        )->post($formActionUrl, [
            [
                'name' => 'frm-id',
                'contents'=> $formId
            ],
            [
                'name' => 'data[title]',
                'contents' => $title
            ],
            [
                'name' => 'data[category]',
                'contents' => $category
            ]
        ]);

        return $uploadResponse->json('uploadpost');
    }

    public function delete(string $uid)
    {
        $url = config('aparat.deleteVideoUrl');
        $url = $this->replaceParams($url, [
            'uid' => $uid,
            'user' => $this->user,
            'token' => $this->getToken()
        ]);

        $response = $this->http::get($url);

        $deleteVideoLink = $response->json('deletevideolink.deleteurl');

        $deleteResponse = $this->http::get($deleteVideoLink);

        return $deleteResponse->json('deletevideo');

    }

    public function show(string $uid)
    {
        $url = config('aparat.showVideoUrl');
        $url = $this->replaceParams($url, [
            'uid' => $uid
        ]);

        $response = $this->http::get($url);

        if (is_null($response->json('video.id'))){
            throw new VideoNotFoundException;
        }

        return $response->json('video');

    }

    private function getToken()
    {
        return Cache::remember('aparat_token', self::TOKEN_EXPIRE_TIME, function() {
            $loginData = $this->login();

            if (array_key_exists('ltoken', $loginData)){
                return $loginData['ltoken'];
            }

            throw new CannotGetTokenException;
        });
    }

    private function getUploadForm()
    {
        $url = config('aparat.formUploadUrl');
        $url = $this->replaceParams($url, [
            'user' => $this->user,
            'token' => $this->getToken()
        ]);

        $response = $this->http::get($url);

        if (is_null($response->json('uploadform.formAction'))){
            throw new CannotGetFormActionException;
        }

        return $response->json('uploadform');
    }

    private function replaceParams($url, $options = [])
    {
        foreach($options as $key => $value){
            $url = str_replace("{{$key}}", $value, $url);
        }

        return $url;
    }

}
