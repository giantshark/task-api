<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListTaskTest extends TestCase
{
  
    public function testMustListTask()
    {
        $response = $this->call('GET', 'api/v1/tasks');
        $data = $this->parseJson($response);
        $this->assertEquals(200, $data->code);
    }

    protected function parseJson($response)
    {
        return json_decode($response->getContent());
    }

    protected function assertIsJson($data)
    {
        $this->assertEquals(0, json_last_error());
    }

}
