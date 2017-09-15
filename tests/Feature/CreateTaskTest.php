<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateTaskTest extends TestCase
{
  
     public function testTaskMustCreateSuccess()
     {
         $task = [
            'subject' => 'new subject',
            'content'    => 'new content',
            'status' => 'pending'
         ];
         $response = $this->call('POST', 'api/v1/tasks', $task);
         $data = $this->parseJson($response);
         $this->assertEquals(200, $data->code);
         $this->assertEquals('new subject', $data->response[0]->subject);
         $this->assertEquals('new content', $data->response[0]->content);
         $this->assertEquals('pending', $data->response[0]->status);
     }

     public function testTaskMustCreateFail()
     {
       $task = [
          'subject' => 'new subject',
          'content'    => 'new content',
          'status' => 'pending fail'
       ];
       $response = $this->call('POST', 'api/v1/tasks', $task);
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
