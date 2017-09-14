<?php
/**
 * Author: Pawan Homsuwan
 * Version: 1.0
 * Date: 2016-09-12
 *
 */
namespace App\Domain\V1\Tasks\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\V1\Tasks\Model\Task;
use Validator;

class TaskController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   */
  public function index(Request $request)
  {
      $rules = [
        'limit' => 'integer|min:1|max:100',
        'offset' => 'integer|min:1'
      ];

      // validate params
      $validator = Validator::make($request->only('limit', 'offset', 'column'), $rules);
      // if invalid params return message with 400 status code
      if (!$validator->passes()) return $this->respond($validator->errors()->all(), 400, []);
      try {
        // validate all params if invalid response 400 status code
        $apiParams = $this->verifyApiParams($request);
        $tasks = Task::select($apiParams['columns'])->offset($apiParams['offset'])->limit($apiParams['limit'])->get();
        return $this->respond([], 200, $tasks);
      } catch (\Exception $e) {
        return $this->respond(['invalid columns parameters'], 400, []);
      }
  }

  /**
   * Store a newly created resource in storage.
   *
   */
  public function store(Request $request)
  {
      $rules = [
        // subjest is required and maximum is 100 characters
        'subject' => 'required|max:100',
        // content is required and maximum is 500 characters
        'content' => 'required|max:500',
        // status is required and must be pending or done
        'status' => 'required|in:pending,done'
      ];
      // validate params
      $validator = Validator::make($request->only('subject', 'content', 'status'), $rules);
      // if invalid params return message with 400 status code
      if (!$validator->passes()) return $this->respond($validator->errors()->all(), 400, []);
      // if validate is pass create a new task
      $task = Task::create($request->only('subject', 'content', 'status'));
      // return new task with 200 status code
      return $this->respond([], 200, [$task]);
  }

  /**
   * Display the specified resource.
   * @param task id
   */
  public function show($id)
  {
      $rules = [
        // task id is required
        'id' => 'required|integer'
      ];
      // validate params
      $validator = Validator::make(['id' => $id], $rules);
      // if invalid params return message with 400 status code
      if (!$validator->passes()) return $this->respond($validator->errors()->all(), 400, []);
      $task = Task::where('id', $id)->first();
      if ($task) {
        return $this->respond([], 200, $task);
      }
      return $this->respond(['task not found'], 400, []);
  }

  /**
   * Update the specified resource in storage.
   * @param task id
   */
  public function update(Request $request, $id)
  {
      $rules = [
        // task id is required
        'id' => 'required|integer',
        // subjest is required and maximum is 100 characters
        'subject' => 'nullable|max:100',
        // content is required and maximum is 500 characters
        'content' => 'nullable|max:500',
        // status is required and must be pending or done
        'status' => 'nullable|in:pending,done'
      ];
      // validate params
      $validator = Validator::make(['id' => $id, 'subject' => $request->subject, 'content' => $request->content, 'status' => $request->status], $rules);
      // if invalid params return message with 400 status code
      if (!$validator->passes()) return $this->respond($validator->errors()->all(), 400, []);
      $task = Task::find($id);
      if ($task) {
          $newTask = $task->update($request->only('subject', 'content', 'status'));
          return $this->respond([], 200, [$task]);
      }
      return $this->respond(['task not found'], 400, []);
  }

  /**
   * Remove the specified resource from storage.
   * @param task id
   */
  public function destroy($id)
  {
      $rules = [
        // task id is required
        'id' => 'required|integer'
      ];
      // validate params
      $validator = Validator::make(['id' => $id], $rules);
      // if invalid params return message with 400 status code
      if (!$validator->passes()) return $this->respond($validator->errors()->all(), 400, []);
      $task = Task::find($id);
      if ($task) {
          $task->delete();
          return $this->respond([], 200, []);
      }
      return $this->respond(['task not found'], 400, []);
  }

  /**
   * change task status
   * @return [type] [description]
   */
  public function status($id, $status)
  {
      $rules = [
        // task id is required
        'id' => 'required|integer',
        // status is required and must be pending or done
        'status' => 'required|in:pending,done'
      ];
      // validate params
      $validator = Validator::make(['id' => $id, 'status' => $status], $rules);
      // if invalid params return message with 400 status code
      if (!$validator->passes()) return $this->respond($validator->errors()->all(), 400, []);
      $task = Task::find($id);
      if ($task) {
          $task->update(['status' => $status]);
          return $this->respond([], 200, [$task]);
      }
      return $this->respond(['task not found'], 400, []);
  }

  /**
   * Validate api params, this method should be move to another class
   * if success return params, if not return empty array
   * @return params in array include valid column, offset, limit
   */
  public function verifyApiParams($request)
  {
      try {
        $columns = empty($request->columns) ? '*' : $this->verifyColumn($request->columns);
        $offset = empty($request->offset) ? 0 : $request->offset;
        $limit = empty($request->limit) ? 100 : $request->limit;
        return [
          'columns' => $columns,
          'offset' => $offset,
          'limit' => $limit
        ];
      } catch (\Exception $e) {
        return [];
      }
  }

  /**
   * Validate columns params
   * @return columns in array, if invalid return * for get all columns
   */
  public function verifyColumn($columns)
  {
      try {
        $columns = collect(explode(',', $columns))->map(function ($item, $key) {
            return trim(str_replace('}', '',str_replace('{','',$item)));
        });
        return $columns->toArray();
      } catch (\Exception $e) {
        return '*';
      }
  }

}
