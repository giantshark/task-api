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
                        <h3 id="api-request-address">Request Address</h3>
                        <p>Returns current user's address, user can deposit using this address(address can be changed do not use as permanent address). response including:</p>
                        <p>GET: <code>http://localhost/api/accounts/{user_id}/addresses</code></p>

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
                            	<td><code>user_id</code></td>
                                <td>User identify key</td>
                                <td><span class="badge">int</span> or <span class="badge">string</span></td>
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
                            	<td><code>address</code></td>
                                <td>user's address</td>
                                <td><span class="badge badge-info">string</span></td>
                            </tr>
                        	<tr>
                            	<td><code>user_id</code></td>
                                <td>account id</td>
                                <td><span class="badge">string</span></td>
                            </tr>
                        </tbody>
                        </table>
                        <h3 id="api-2">Transaction History</h3>
<p>GET: <code>http://localhost/api/accounts/{user_id}/transactions?status={status}&amp;is_test={is_test_mode}</code></p><p>Returns user transactions history. response including:</p>

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
                            	<td><code>user_id</code></td>
                                <td>User identify key</td>
                                <td><span class="badge">int</span> or <span class="badge">string</span></td>
                            </tr>

                        <tr>
                            	<td><span class="badge badge-important">Optional</span></td>
                            	<td><code>status</code></td>
                                <td>transaction status
<ul>

                            <li><code>unconfirmed</code>- filter only unconfirmed transaction</li>


                        <li><code>confirmed</code>- filter only confirmed transaction</li></ul>
</td>
                                <td><span class="badge">string</span></td>
                            </tr><tr>
                            	<td><span class="badge badge-important">Optional</span></td>
                            	<td><code>is_test</code></td>
                                <td>testmode
<ul>
                        	<li><code>1</code>- include transaction in testmode</li>



                        </ul>
</td>
                                <td><span class="badge">int</span></td>
                            </tr></tbody>
                        </table>



                        <h5>Returned JSON values:</h5><table class="table table-bordered table-striped dyntable">
                        <thead>
                        <tr>
                            <th>Field</th>
                            <th>Description</th>
                            <th>Possible Values</th>
                        </tr>
                        </thead>
                        <tbody>
                        	<tr>
                            	<td><code>address</code></td>
                                <td>user's address</td>
                                <td><span class="badge badge-info">string</span></td>
                            </tr>
                        	<tr>
                            	<td><code>confirmation</code></td>
                                <td>bitcoin confirmation</td>
                                <td><span class="badge">int</span></td>
                            </tr>
                        <tr>
                            	<td><code>date</code></td>
                                <td>confirmation date</td>
                                <td><span class="badge">datetime</span></td>
                            </tr><tr>
                            	<td><code>tx_hash</code></td>
                                <td>transaction id</td>
                                <td><span class="badge">string</span></td>
                            </tr><tr>
                            	<td><code>value</code></td>
                                <td>bitcoin value</td>
                                <td><span class="badge">numeric</span></td>
                            </tr><tr>
                            	<td><code>usd</code></td>
                                <td>value in usd</td>
                                <td><span class="badge">numeric</span></td>
                            </tr><tr>
                            	<td><code>user_id</code></td>
                                <td>account id</td>
                                <td><span class="badge">string</span></td>
                            </tr><tr>
                            	<td><code>is_test</code></td>
                                <td>
test mode
<ul>

                            <li><code>0</code>- real bitcoin transaction</li>


                        <li><code>1</code>- test mode transaction</li></ul>
</td>
                                <td><span class="badge">string</span></td>
                            </tr><tr>
                            	<td><code>updated_at</code></td>
                                <td>last date that transaction be comfirmed</td>
                                <td><span class="badge">string</span></td>
                            </tr></tbody>
                        </table>
<h3 id="api-3">Transaction Detail</h3>
                        <p>GET: <code>http://localhost/api/transactions/{tx_hash}</code></p>
                        <p>Returns transaction detail. response including:</p>
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
                            	<td><span class="badge badge-success">Required</span></td>
                            	<td><code>tx_hash</code></td>
                                <td>Transaction Id</td>
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
                            	<td><code>address</code></td>
                                <td>user's address</td>
                                <td><span class="badge badge-info">string</span></td>
                            </tr>
                        	<tr>
                            	<td><code>confirmation</code></td>
                                <td>bitcoin confirmation</td>
                                <td><span class="badge">int</span></td>
                            </tr>
                        <tr>
                            	<td><code>date</code></td>
                                <td>confirmation date</td>
                                <td><span class="badge">datetime</span></td>
                            </tr><tr>
                            	<td><code>tx_hash</code></td>
                                <td>transaction id</td>
                                <td><span class="badge">string</span></td>
                            </tr><tr>
                            	<td><code>value</code></td>
                                <td>bitcoin value</td>
                                <td><span class="badge">numeric</span></td>
                            </tr><tr>
                            	<td><code>usd</code></td>
                                <td>value in usd</td>
                                <td><span class="badge">numeric</span></td>
                            </tr><tr>
                            	<td><code>user_id</code></td>
                                <td>account id</td>
                                <td><span class="badge">string</span></td>
                            </tr><tr>
                            	<td><code>is_test</code></td>
                                <td>
test mode
<ul>

                            <li><code>0</code>- real bitcoin transaction</li>


                        <li><code>1</code>- test mode transaction</li></ul>
</td>
                                <td><span class="badge">string</span></td>
                            </tr><tr>
                            	<td><code>updated_at</code></td>
                                <td>last date that transaction be comfirmed</td>
                                <td><span class="badge">string</span></td>
                            </tr></tbody>
                        </table>
                        <h3 id="api-4">Address History</h3>
                        <p>GET: <code>http://localhost/api/addresses/{address}</code></p>
                        <p>Returns address history. response including:</p>
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
                            	<td><span class="badge badge-success">Required</span></td>
                            	<td><code>address</code></td>
                                <td>address id</td>
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
                            	<td><code>address</code></td>
                                <td>Address</td>
                                <td><span class="badge">string</span></td>
                            </tr>
                        	<tr>
                            	<td><code>user_id</code></td>
                                <td>User Id</td>
                                <td><span class="badge">string</span></td>
                            </tr>
                        	<tr>
                            	<td><code>created_at</code></td>
                                <td>request time</td>
                                <td><span class="badge">datetime</span></td>
                            </tr>
                        </tbody>
                        </table>
                        <hr>
                        <h2>Test Mode API</h2>
<p>Test mode api, for test deposit, confirm transaction, and remove transaction</p>
<p>Note: all params required only test mode transaction</p>
                        <h3 id="api-5">Deposit</h3>
<p>Deposit to user address</p><p></p>
                        <p>POST: <code>http://localhost/api/transactions/deposit</code></p>

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
                            	<td><code>amountBtc</code></td>
                                <td>bitcoin value</td>
                                <td><span class="badge">numeric</span></td>
                            </tr>
                        <tr>
                            	<td><span class="badge badge-important">Required</span></td>
                            	<td><code>address</code></td>
                                <td>bitcoin address</td>
                                <td><span class="badge">string</span></td>
                            </tr></tbody>
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
                            	<td><code>address</code></td>
                                <td>user's address</td>
                                <td><span class="badge badge-info">string</span></td>
                            </tr>
                        	<tr>
                            	<td><code>confirmation</code></td>
                                <td>bitcoin confirmation</td>
                                <td><span class="badge">int</span></td>
                            </tr>
                        <tr>
                            	<td><code>date</code></td>
                                <td>confirmation date</td>
                                <td><span class="badge">datetime</span></td>
                            </tr><tr>
                            	<td><code>tx_hash</code></td>
                                <td>transaction id</td>
                                <td><span class="badge">string</span></td>
                            </tr><tr>
                            	<td><code>value</code></td>
                                <td>bitcoin value</td>
                                <td><span class="badge">numeric</span></td>
                            </tr><tr>
                            	<td><code>usd</code></td>
                                <td>value in usd</td>
                                <td><span class="badge">numeric</span></td>
                            </tr><tr>
                            	<td><code>user_id</code></td>
                                <td>account id</td>
                                <td><span class="badge">string</span></td>
                            </tr><tr>
                            	<td><code>is_test</code></td>
                                <td>
test mode
<ul>

                            <li><code>0</code>- real bitcoin transaction</li>


                        <li><code>1</code>- test mode transaction</li></ul>
</td>
                                <td><span class="badge">string</span></td>
                            </tr><tr>
                            	<td><code>updated_at</code></td>
                                <td>last date that transaction be comfirmed</td>
                                <td><span class="badge">string</span></td>
                            </tr></tbody>
                        </table>


                        <h3 id="api-6">Confirm Transaction</h3>
                        <p><em>Confirm test mode transaction</em></p>
                        <p>POST: <code>http://localhost/api/transactions/confirm</code></p>

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
                            	<td><code>tx_hash</code></td>
                                <td>bitcoin transaction</td>
                                <td><span class="badge">string</span></td>
                            </tr>
                        	<tr>
                            	<td><span class="badge badge-important">Required</span></td>
                            	<td><code>confirm</code></td>
                                <td>number of confirmation</td>
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
                            	<td><code>address</code></td>
                                <td>user's address</td>
                                <td><span class="badge badge-info">string</span></td>
                            </tr>
                        	<tr>
                            	<td><code>confirmation</code></td>
                                <td>bitcoin confirmation</td>
                                <td><span class="badge">int</span></td>
                            </tr>
                        <tr>
                            	<td><code>date</code></td>
                                <td>confirmation date</td>
                                <td><span class="badge">datetime</span></td>
                            </tr><tr>
                            	<td><code>tx_hash</code></td>
                                <td>transaction id</td>
                                <td><span class="badge">string</span></td>
                            </tr><tr>
                            	<td><code>value</code></td>
                                <td>bitcoin value</td>
                                <td><span class="badge">numeric</span></td>
                            </tr><tr>
                            	<td><code>usd</code></td>
                                <td>value in usd</td>
                                <td><span class="badge">numeric</span></td>
                            </tr><tr>
                            	<td><code>user_id</code></td>
                                <td>account id</td>
                                <td><span class="badge">string</span></td>
                            </tr><tr>
                            	<td><code>is_test</code></td>
                                <td>
test mode
<ul>

                            <li><code>0</code>- real bitcoin transaction</li>


                        <li><code>1</code>- test mode transaction</li></ul>
</td>
                                <td><span class="badge">string</span></td>
                            </tr><tr>
                            	<td><code>updated_at</code></td>
                                <td>last date that transaction be comfirmed</td>
                                <td><span class="badge">string</span></td>
                            </tr></tbody>
                        </table>




                        <h3 id="api-7">Remove</h3>
                        <p>DELETE: <code>http://localhost/api/transactions/{tx_hash}</code></p>


                        <p>Remove testmode transaction</p>
                        <h5>Returned JSON values (for each option):</h5>
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
                            	<td><code>tx_hash</code></td>
                                <td>bitcoin transaction</td>
                                <td><span class="badge">string</span></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
