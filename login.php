<div class="col-xs-12">
    <div class="col-xs-12 col-sm-4 col-sm-offset-4" id="loginbox">
        <form class="form-horizontal" role="form" name="loginForm" novalidate>
    <div class="form-group" >
        <div class="col-xs-12">
            <input type="text" id="userName" name="userName" placeholder="User Name" class="form-control" ng-model="userName" required />
            <span class="help-block" ng-show="loginForm.userName.$touched && loginForm.userName.$invalid">Please enter User Name.</span>
        </div>
    </div>
    <div class="form-group" >
        <div class="col-xs-12">
            <input type="password" id="password" name="password" placeholder="Password" class="form-control" ng-model="password" required />
            <span ng-show="loginForm.password.$touched && loginForm.password.$error.required">Please enter Password.</span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 com-sm-offset-3" ng-show="showstatus">Login Id and Password don't match</label>
    </div>
    <div class="form-group">
        <div class="col-xs-6 col-xs-offset-3">
            <input type="submit" value="Login" class="all-btn form-control" ng-click="authenticate()" />
        </div>         
    </div>   
</form>
    </div>
    
</div>
