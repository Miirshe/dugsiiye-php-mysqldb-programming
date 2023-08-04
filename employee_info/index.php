<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee demo</title>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body style="background-color: #f7f5f5;">
  <div class="container-fluid ">
    <div class="row mt-5 justify-content-center align-items-center">
        <div class="col-sm-11">
            <div class="card">
               <div class="card-body">
                  <div style="display: flex; justify-content:space-between; align-items:center;">
                      <h1 class="card-title">Employee Registration</h1>
                      <button class="btn btn-dark float-end" id="btnModel">Add New Employee</button>
                  </div>
                    <table id="tableEmployee" class="table mt-5">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
               </div>
            </div>
    </div>
</div>
<div class="modal" tabindex="-1" id="popUpModel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Employee Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="employeeForm">
                <div class="form-group mt-3">
                    <input type="text" name="Employee_ID" id="Employee_ID" class="form-control" placeholder="Enter Employee ID ">
                </div>
                <div class="form-group mt-3">
                    <input type="text" name="Employee_Name" id="Employee_Name" class="form-control" placeholder="Enter Employee Name ">
                </div>
                <div class="form-group mt-3">
                    <input type="number" name="Employee_Phone" id="Employee_Phone" class="form-control" placeholder="Enter Employee Phone ">
                </div>
                <div class="form-group mt-3">
                    <input type="text" name="Employee_Address" id="Employee_Address" class="form-control" placeholder="Enter Employee Address ">
                </div>
                <div class="form-group mt-3">
                    <input type="date" name="Employee_Date" id="Employee_Date" class="form-control">
                </div>
                <div class="modal-footer mt-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>
