<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewTaskTest extends TestCase
{
  public function testMustViewTask()
  {
      $response = $this->call('GET', 'api/v1/tasks/1');
      $data = $this->parseJson($response);
      $this->assertEquals(200, $data->code);
  }

  public function testMustFailViewTask()
  {
      $response = $this->call('GET', 'api/v1/tasks/-1');
      $data = $this->parseJson($response);
      $this->assertEquals(400, $data->code);
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
