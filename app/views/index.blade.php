<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="width: 32rem; margin-top: 12px;">
                <div class="card-body p-4">
                    <h2 class="text-center">Sample PHP CRUD</h2>
                    <div class="">
                        <span>First Name</span>
                        <input type="text" class="form-control" id="txtfirstname">
                        <span>Last Name</span>
                        <input type="text" class="form-control" id="txtlastname">
                        <span>Course</span>
                        <input type="text" class="form-control" id="txtcourse">
                        <button class="btn btn-primary mt-2" id="btnOnSave">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card" style="width: 32rem; margin-top: 12px;">
                <div class="card-body p-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Course</th>
                            </tr>
                        </thead>
                        <tbody id="dataContainer">
                        </tbody>
                    </table>                        
                </div>
            </div>  
        </div>
    </div>
</div>
