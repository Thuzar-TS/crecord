
    <div class="col-xs-12">
    <div class="col-xs-12 col-sm-9 pad-free"  id="alltable" style="height:500px;">
        <table class="table table-striped table-bordered pad-free">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th colspan="2" style="text-align:center;">&nbsp;</th>
        </tr>
        <tr ng-repeat="x in projects">
            <td style="width:50px;">{{$index+1}}</td>
            <td>{{x.project_name}}</td>
            <td style="width:50px;"><label ng-click="BindProject(x)" style="cursor:pointer;color:green;">Edit</label></td>
            <td style="width:50px;"><label ng-click="DeleteProject(x.project_id)" style="cursor:pointer;color:red;">Delete</label></td>
        </tr>
        </table>
    </div>  
    <div class="col-xs-12 col-sm-3">
        <form class="col-xs-12 form-horizontal" id="formdiv">
                <div class="form-group">
                    <label class="col-xs-12">Name</label>
                    <div class="col-xs-12">
                        <input type="text" class="form-control" ng-model="project_name" ng-required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6 col-sm-6">
                        <div class="col-sm-12 pad-free">
                            <input type="button" ng-click='SavePorject()' class="form-control all-btn" name="submit" value="Save" ng-show="showproject" ng-disabled="l_hide">
                        </div>
                        <div class="col-sm-12 pad-free">
                            <input type="button" ng-click='EditProject()' class="form-control all-btn" name="edit" value="Edit" ng-show="!showproject" ng-disabled="l_hide">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6">
                        <input type="button" ng-click='CancelProject()' class="form-control all-btn" name="cancel" value="Cancel">
                    </div>
                </div>
        </form>
    </div>
    </div>

