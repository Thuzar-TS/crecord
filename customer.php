
    <div class="col-xs-12">
                <div class="col-xs-12 col-sm-9 pad-free" id="custbl">
                    <table class="table table-striped table-bordered pad-free">
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Project</th>
                            <th>Phone No</th>
                            <th>Address</th>
                            <th>Remark</th>
                            <th colspan="2" style="text-align:center;">&nbsp;</th>
                        </tr>
                        <tr ng-repeat="x in customers">
                            <td>{{$index+1}}</td>
                            <td>{{x.customer_name}}</td>
                            <td>{{x.project_name}}</td>
                            <td>{{x.phone_no}}</td>
                            <td>{{x.address}}</td>
                            <td>{{x.remark}}</td>
                            <td><label ng-click="BindCustomer(x)" style="cursor:pointer;color:green;">Edit</label></td>
                            <td><label ng-click="DeleteCusomter(x)" style="cursor:pointer; color:red;">Delete</label></td>
                        </tr>
                    </table>
                </div>
              
    <div class="col-xs-12 col-sm-3 pad-free">
                    <form class="col-xs-12 form-horizontal" id="formdiv">
                            <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="firstName" class="control-label">Name :</label>
                                    </div>
                                    
                                    <div class="col-xs-12">
                                        <input type="text" id="firstName" class="form-control" ng-model="customer_name" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="project" class="control-label">Project :</label>
                                    </div>
                                    <div class="col-xs-12">
                                        <select ng-options="p as p.project_name for p in projects track by p.project_id" 
                                        ng-model="project" class="form-control" id="project">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="add" class="control-label">Address :</label>
                                    </div>
                                    <div class="col-xs-12">
                                        <textarea id="add" class="form-control" rows="5" ng-model="address"></textarea>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="ph" class="control-label">Phone number :</label>
                                    </div>
                                    <div class="col-xs-12">
                                          <input type="text" id="ph" class="form-control" ng-model="phone_no" />
                                    </div>
                                </div>      

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="remark" class="control-label">Remark :</label>
                                    </div>
                                    <div class="col-xs-12">
                                         <textarea id="remark" class="form-control" rows="5" ng-model="remark" ng-init="remark=''"></textarea>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <div class="col-xs-6 col-sm-6" style="margin-bottom:10px;">
                                        <div class="col-sm-12 pad-free">
                                            <input type="button" ng-click='SaveCustomer()' class="form-control all-btn" name="submit" value="Save" ng-show="showcustomer" ng-disabled="l_hide">
                                        </div>
                                        <div class="col-sm-12 pad-free">
                                            <input type="button" ng-click='EditCustomer()' class="form-control all-btn" name="edit" value="Edit" ng-show="!showcustomer" ng-disabled="l_hide">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6" style="margin-bottom:10px;">
                                                <input  type="button" ng-click='CancelCustomer()' class="form-control all-btn" name="cancel" value="Cancel">
                                    </div>
                                </div>
                </form>
            </div>
    </div>

