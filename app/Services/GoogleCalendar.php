<?php namespace Bubbles\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class GoogleCalendar {

    protected $client;

    protected $service;

    protected $calendarId;

    function __construct() {
        /* Get config variables */
        $this->calendarId = Config::get('google.calendar_id');
        $client_id = Config::get('google.client_id');
        $service_account_name = Config::get('google.service_account_name');
        $key_file_location = base_path() . Config::get('google.key_file_location');

        $this->client = new \Google_Client();
        $this->client->setApplicationName("Bubbles Pet Salon");
        $this->service = new \Google_Service_Calendar($this->client);

        /* If we have an access token */
        if (Cache::has('service_token')) {
            $this->client->setAccessToken(Cache::get('service_token'));
        }

        $key = file_get_contents($key_file_location);
        /* Add the scopes you need */
        $scopes = array('https://www.googleapis.com/auth/calendar');
        $cred = new \Google_Auth_AssertionCredentials(
            $service_account_name,
            $scopes,
            $key
        );

        $this->client->setAssertionCredentials($cred);
        if ($this->client->getAuth()->isAccessTokenExpired()) {
            $this->client->getAuth()->refreshTokenWithAssertion($cred);
        }
        Cache::forever('service_token', $this->client->getAccessToken());
    }

    public function get()
    {
        return $this->service->calendars->get("if2q91gt3i7jp7e249j5err6ec@group.calendar.google.com");
    }

    public function insertEvent()
    {
        /*$cal = $this->get();
        $appointment = array(
            'id' => 'Test ID',
            'description' => 'Testing this shit out'
        );*/
//        $cal = $this->service->calendarList->get("if2q91gt3i7jp7e249j5err6ec@group.calendar.google.com");
        $cal = $this->get();
        dd($cal);
        $list = $cal->calendarList->list();

        dd($list);
    }
}