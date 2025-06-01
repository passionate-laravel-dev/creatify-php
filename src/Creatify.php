<?php

namespace Passionatelaraveldev\Creatify;

use Passionatelaraveldev\Creatify\Api\AIScripts;
use Passionatelaraveldev\Creatify\Api\Avatar;
use Passionatelaraveldev\Creatify\Api\BaseApiClient;
use Passionatelaraveldev\Creatify\Api\Links;
use Passionatelaraveldev\Creatify\Api\LinkToVideos;
use Passionatelaraveldev\Creatify\Api\Lipsyncs;
use Passionatelaraveldev\Creatify\Api\Musics;
use Passionatelaraveldev\Creatify\Api\Voices;
use Passionatelaraveldev\Creatify\Api\Workspace;

class Creatify
{
    protected BaseApiClient $client;

    public function __construct(
        string $apiId,
        string $apiKey,
        string $baseUrl = 'https://api.creatify.ai/'
    ) {
        $this->client = new BaseApiClient($apiId, $apiKey, $baseUrl);
    }

    public function links(): Links
    {
        return new Links($this->client);
    }

    public function avatar(): Avatar
    {
        return new Avatar($this->client);
    }

    public function aiScripts(): AIScripts
    {
        return new AIScripts($this->client);
    }

    public function linkToVideos(): LinkToVideos
    {
        return new LinkToVideos($this->client);
    }

    public function lipsyncs(): Lipsyncs
    {
        return new Lipsyncs($this->client);
    }

    public function musics(): Musics
    {
        return new Musics($this->client);
    }

    public function voices(): Voices
    {
        return new Voices($this->client);
    }

    public function workspace(): Workspace
    {
        return new Workspace($this->client);
    }
}
