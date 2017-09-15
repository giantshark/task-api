<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script></script>
        <style>
        .nav>li>a {
            position: relative;
            display: block;
            padding: 0px 0px;
        }
        </style>
        <title>API DOC</title>
    </head>
    <body>
      <div class="container" style="margin-top: 50px;">
        <div class="row-panel">
            <div class="row">
                <div class="col-md-3">
                    <div class="panel-content" style="position:relative;">
                        <ul class="nav nav-list scrollto floatmenu">
                          	<li class="nav-header">Task API Functions</li>
                          	<li><a href="#api"></a></li>
                            <li><a href="#api-list-tasks">List all tasks</a></li>
                            <li><a href="#api-view-task">View task detail</a></li>
                            <li><a href="#api-create-task">Create task</a></li>
                            <li><a href="#api-update-task">Update task</a></li>
                            <li><a href="#api-delete-task">Delete task</a></li>
                            <li><a href="#api-update-task-status">Update task status</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel-content">
                    	<h1>API Documentation</h1>
                        <hr>
                        <h2 id="private-api">Task API</h2>
                        <h3>Returned JSON Status and Message:</h3>
                        <table class="table table-bordered table-striped dyntable">
                        <thead>
                        <tr>
                            <th>Field</th>
                            <th>Description</th>
                            <th>Possible Values</th>
                        </tr>
                        </thead>
                        <tbody>
                        	<tr>
                            <td><code>code</code></td>
                              <td>status code<ul>
                                <li><code>200</code>- success</li>
                                  <li><code>400</code>- not success</li>
                                </ul>
                              </td>
                              <td><span class="badge badge-info">int</span></td>
                          </tr>
                        	<tr>
                            	<td><code>message</code></td>
                              <td>return empty array is success, if not return array of errors response</td>
                              <td><span class="badge">array</span></td>
                          </tr>
                          <tr>
                            	<td><code>response</code></td>
                              <td>Response data set</td>
                              <td><span class="badge badge-info">array</span>
                          </tr>
                        </tbody>
                        </table>
                        <!-- LIST TASK -->
                        <h3 id="api-list-tasks">List tasks</h3>
                        <p>GET: <code>http://localhost/api/v1/tasks?limit=limit&offset=offset&column={column1,column2}</code></p>

                        <table class="table table-bordered table-striped dyntable">
                        <thead>
                        <tr>
                            <th colspan="2">Field</th>
                            <th>Description</th>
                            <th>Possible Values</th>
                        </tr>
                        </thead>
                        <tbody>
                        	<tr>
                            	<td><span class="badge badge-important">Optional</span></td>
                            	<td><code>limit</code></td>
                              <td>limit of resources</td>
                              <td><span class="badge">int</span></td>
                          </tr>
                          <tr>
                              <td><span class="badge badge-important">Optional</span></td>
                              <td><code>offset</code></td>
                              <td>skip next N resources</td>
                              <td><span class="badge">int</span></td>
                          </tr>
                          <tr>
                              <td><span class="badge badge-important">Optional</span></td>
                              <td><code>column</code></td>
                              <td>column of resources, {id, subject, content}</td>
                              <td><span class="badge">string</span></td>
                          </tr>
                        </tbody>
                        </table>

                        <h5>Returned JSON values:</h5>
                        <table class="table table-bordered table-striped dyntable">
                        <thead>
                        <tr>
                            <th>Field</th>
                            <th>Description</th>
                            <th>Possible Values</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td><code>id</code></td>
                                <td>task id</td>
                                <td><span class="badge badge-info">int</span></td>
                            </tr>
                        	  <tr>
                            	<td><code>subject</code></td>
                                <td>task subject</td>
                                <td><span class="badge badge-info">string</span></td>
                            </tr>
                        	  <tr>
                            	<td><code>content</code></td>
                              <td>task content of detail</td>
                              <td><span class="badge">string</span></td>
                            </tr>
                            <tr>
                              <td><code>status</code></td>
                              <td>task status</td>
                              <td><span class="badge">string</span></td>
                            </tr>
                            <tr>
                              <td><code>created_at</code></td>
                              <td>when task is created</td>
                              <td><span class="badge">datetime</span></td>
                            </tr>
                            <tr>
                              <td><code>updated_at</code></td>
                              <td>when task is updated</td>
                              <td><span class="badge">datetime</span></td>
                            </tr>
                        </tbody>
                        </table>
                        <hr>
                        <!-- END LIST TASK -->
                        <!-- TASK DETAIL -->
                        <h3 id="api-view-task">Task Detail</h3>
                        <p>GET: <code>http://localhost/api/v1/tasks/{task_id}</code></p>
                        <table class="table table-bordered table-striped dyntable">
                        <thead>
                        <tr>
                            <th colspan="2">Field</th>
                            <th>Description</th>
                            <th>Possible Values</th>
                        </tr>
                        </thead>
                        <tbody>
                        	<tr>
                            <td><span class="badge badge-important">Required</span></td>
                            <td><code>task_id</code></td>
                            <td>Task identify key</td>
                            <td><span class="badge">int</span></td>
                          </tr>
                          </tbody>
                        </table>
                        <h5>Returned JSON values:</h5>
                        <table class="table table-bordered table-striped dyntable">
                        <thead>
                        <tr>
                            <th>Field</th>
                            <th>Description</th>
                            <th>Possible Values</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><code>id</code></td>
                              <td>task id</td>
                              <td><span class="badge badge-info">int</span></td>
                          </tr>
                          <tr>
                            	<td><code>subject</code></td>
                                <td>task subject</td>
                                <td><span class="badge badge-info">string</span></td>
                            </tr>
                        	<tr>
                            	<td><code>content</code></td>
                              <td>task content of detail</td>
                              <td><span class="badge">string</span></td>
                            </tr>
                            <tr>
                              <td><code>status</code></td>
                              <td>task status</td>
                              <td><span class="badge">string</span></td>
                            </tr>
                            <tr>
                              <td><code>created_at</code></td>
                              <td>when task is created</td>
                              <td><span class="badge">datetime</span></td>
                            </tr>
                            <tr>
                              <td><code>updated_at</code></td>
                              <td>when task is updated</td>
                              <td><span class="badge">datetime</span></td>
                            </tr>
                        </tbody>
                        </table>
                        <hr>
                        <!-- END TASK DETAIL -->
                        <!-- CREATE TASK -->
                        <h3 id="api-create-task">Create Task</h3>
                        <p>POST: <code>http://localhost/api/v1/tasks</code></p>
                        <h5>Header</h5>
                        <table class="table table-bordered table-striped dyntable">
                        <thead>
                        <tr>
                            <th colspan="1">Header</th>
                            <th colspan="2">Value</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Content-Type</td>
                            <td><code>application/x-www-form-urlencoded</code></td>
                          </tr>
                          </tbody>
                        </table>
                        <h5>Form Params</h5>
                        <table class="table table-bordered table-striped dyntable">
                        <thead>
                        <tr>
                            <th colspan="2">Field</th>
                            <th>Description</th>
                            <th>Possible Values</th>
                        </tr>
                        </thead>
                        <tbody>
                        	<tr>
                            <td><span class="badge badge-important">Required</span></td>
                            <td><code>subject</code></td>
                            <td>Task subject</td>
                            <td><span class="badge">string</span></td>
                          </tr>
                          <tr>
                            <td><span class="badge badge-important">Required</span></td>
                            <td><code>content</code></td>
                            <td>Task content</td>
                            <td><span class="badge">string</span></td>
                          </tr>
                          <tr>
                            <td><span class="badge badge-important">Required</span></td>
                            <td><code>status</code></td>
                            <td>task status, pending or done</td>
                            <td><span class="badge">string</span></td>
                          </tr>
                          </tbody>
                        </table>
                        <h5>Returned JSON values:</h5>
                        <table class="table table-bordered table-striped dyntable">
                        <thead>
                        <tr>
                            <th>Field</th>
                            <th>Description</th>
                            <th>Possible Values</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><code>id</code></td>
                              <td>task id</td>
                              <td><span class="badge badge-info">int</span></td>
                          </tr>
                          <tr>
                            	<td><code>subject</code></td>
                                <td>task subject</td>
                                <td><span class="badge badge-info">string</span></td>
                            </tr>
                        	<tr>
                            	<td><code>content</code></td>
                              <td>task content of detail</td>
                              <td><span class="badge">string</span></td>
                            </tr>
                            <tr>
                              <td><code>status</code></td>
                              <td>task status</td>
                              <td><span class="badge">string</span></td>
                            </tr>
                            <tr>
                              <td><code>created_at</code></td>
                              <td>when task is created</td>
                              <td><span class="badge">datetime</span></td>
                            </tr>
                            <tr>
                              <td><code>updated_at</code></td>
                              <td>when task is updated</td>
                              <td><span class="badge">datetime</span></td>
                            </tr>
                        </tbody>
                        </table>
                        <!-- END CREATE TASK -->
                        <!-- EDIT TASK -->
                        <hr>
                        <h3 id="api-update-task">Edit Task</h3>
                        <p>PUT: <code>http://localhost/api/v1/tasks/{task_id}</code></p>
                        <h5>Header</h5>
                        <table class="table table-bordered table-striped dyntable">
                        <thead>
                        <tr>
                            <th colspan="1">Header</th>
                            <th colspan="2">Value</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Content-Type</td>
                            <td><code>application/x-www-form-urlencoded</code></td>
                          </tr>
                          </tbody>
                        </table>
                        <h5>URL Params</h5>
                        <table class="table table-bordered table-striped dyntable">
                        <thead>
                        <tr>
                            <th colspan="2">Field</th>
                            <th>Description</th>
                            <th>Possible Values</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><span class="badge badge-important">Required</span></td>
                            <td><code>task_id</code></td>
                            <td>Task identify key</td>
                            <td><span class="badge">int</span></td>
                          </tr>
                          </tbody>
                        </table>
                        <h5>Form Params</h5>
                        <table class="table table-bordered table-striped dyntable">
                        <thead>
                        <tr>
                            <th colspan="2">Field</th>
                            <th>Description</th>
                            <th>Possible Values</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><span class="badge badge-important">Optional</span></td>
                            <td><code>subject</code></td>
                            <td>Task subject</td>
                            <td><span class="badge">string</span></td>
                          </tr>
                          <tr>
                            <td><span class="badge badge-important">Optional</span></td>
                            <td><code>content</code></td>
                            <td>Task content</td>
                            <td><span class="badge">string</span></td>
                          </tr>
                          <tr>
                            <td><span class="badge badge-important">Optional</span></td>
                            <td><code>status</code></td>
                            <td>task status, pending or done</td>
                            <td><span class="badge">string</span></td>
                          </tr>
                          </tbody>
                        </table>
                        <h5>Returned JSON values:</h5>
                        <table class="table table-bordered table-striped dyntable">
                        <thead>
                        <tr>
                            <th>Field</th>
                            <th>Description</th>
                            <th>Possible Values</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><code>id</code></td>
                              <td>task id</td>
                              <td><span class="badge badge-info">int</span></td>
                          </tr>
                          <tr>
                              <td><code>subject</code></td>
                                <td>task subject</td>
                                <td><span class="badge badge-info">string</span></td>
                            </tr>
                          <tr>
                              <td><code>content</code></td>
                              <td>task content of detail</td>
                              <td><span class="badge">string</span></td>
                            </tr>
                            <tr>
                              <td><code>status</code></td>
                              <td>task status</td>
                              <td><span class="badge">string</span></td>
                            </tr>
                            <tr>
                              <td><code>created_at</code></td>
                              <td>when task is created</td>
                              <td><span class="badge">datetime</span></td>
                            </tr>
                            <tr>
                              <td><code>updated_at</code></td>
                              <td>when task is updated</td>
                              <td><span class="badge">datetime</span></td>
                            </tr>
                        </tbody>
                        </table>
                        <!-- END EDIT TASK -->
                        <!-- DELETE DETAIL -->
                        <h3 id="api-delete-task">Delete Detail</h3>
                        <p>DELETE: <code>http://localhost/api/v1/tasks/{task_id}</code></p>
                        <table class="table table-bordered table-striped dyntable">
                        <thead>
                        <tr>
                            <th colspan="2">Field</th>
                            <th>Description</th>
                            <th>Possible Values</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><span class="badge badge-important">Required</span></td>
                            <td><code>task_id</code></td>
                            <td>Task identify key</td>
                            <td><span class="badge">int</span></td>
                          </tr>
                          </tbody>
                        </table>
                        <hr>
                        <!-- END DELETE TASK -->
                        <!-- SET TASK STATUS -->
                        <hr>
                        <h3 id="api-update-task-status">Set Task Status</h3>
                        <p>PUT: <code>http://localhost/api/v1/tasks/{task_id}/statuses/{status}</code></p>
                        <h5>Header</h5>
                        <table class="table table-bordered table-striped dyntable">
                        <thead>
                        <tr>
                            <th colspan="1">Header</th>
                            <th colspan="2">Value</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Content-Type</td>
                            <td><code>application/x-www-form-urlencoded</code></td>
                          </tr>
                          </tbody>
                        </table>
                        <h5>URL Params</h5>
                        <table class="table table-bordered table-striped dyntable">
                        <thead>
                        <tr>
                            <th colspan="2">Field</th>
                            <th>Description</th>
                            <th>PossibEditle Values</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><span class="badge badge-important">Required</span></td>
                            <td><code>task_id</code></td>
                            <td>Task identify key</td>
                            <td><span class="badge">int</span></td>
                          </tr>
                          <tr>
                            <td><span class="badge badge-important">Required</span></td>
                            <td><code>status</code></td>
                            <td>pending or done</td>
                            <td><span class="badge">string</span></td>
                          </tr>
                          </tbody>
                        </table>
                        <h5>Returned JSON values:</h5>
                        <table class="table table-bordered table-striped dyntable">
                        <thead>
                        <tr>
                            <th>Field</th>
                            <th>Description</th>
                            <th>Possible Values</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><code>id</code></td>
                              <td>task id</td>
                              <td><span class="badge badge-info">int</span></td>
                          </tr>
                          <tr>
                              <td><code>subject</code></td>
                                <td>task subject</td>
                                <td><span class="badge badge-info">string</span></td>
                            </tr>
                          <tr>
                              <td><code>content</code></td>
                              <td>task content of detail</td>
                              <td><span class="badge">string</span></td>
                            </tr>
                            <tr>
                              <td><code>status</code></td>
                              <td>task status</td>
                              <td><span class="badge">string</span></td>
                            </tr>
                            <tr>
                              <td><code>created_at</code></td>
                              <td>when task is created</td>
                              <td><span class="badge">datetime</span></td>
                            </tr>
                            <tr>
                              <td><code>updated_at</code></td>
                              <td>when task is updated</td>
                              <td><span class="badge">datetime</span></td>
                            </tr>
                        </tbody>
                        </table>
                        <!-- END SET TASK STATUS -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
