 angular.module('controller', [])
.controller("loginController", function($scope, $location,$http,$log,$rootScope) {

          $("#heading").removeClass("col-sm-8");
          $("#heading").addClass("col-sm-4");  
          $("#heading").addClass("col-sm-offset-4");  
            $rootScope.showmenu=false;
            $scope.showstatus=false;
           $scope.authenticate=function(){
            if ($scope.userName!=null || $scope.userName!=undefined || $scope.password!=null || $scope.password!=undefined) 
              {
                  $http.post('loginquery.php', {'login_id':$scope.userName,'pass':$scope.password })
                       .then(function(response){
                          if (response.data!="Error") {
                               window.localStorage.setItem("user_id",response.data.users[0]);                         
                               
                               $("#mnbar").css("display","block");
                               $scope.showmenu=true;
                               $location.path('/customer');
                           }
                           else{
                                      $scope.showstatus=true;
                           }                   
                       })
               }
           }
       })
.controller("customerController", function($scope, $location,$http,$log) {  
    if (window.localStorage.getItem("user_id")) {
      $("#heading").addClass("col-sm-8");
          $("#heading").removeClass("col-sm-4");  
          $("#heading").removeClass("col-sm-offset-4");
          $scope.remark = "";
      $scope.user_id = window.localStorage.getItem("user_id");            
            $scope.showcustomer=true;
            $scope.l_hide=false;
            $("#mnbar").css("display","block");
             $http.post('customer_query.php', {'type':''})
                 .then(function(response){
                    $scope.customers=response.data.customers;
                    if (response.data.projects!="No record") 
                        {
                            $scope.projects=response.data.projects;
                            $scope.projects.splice(0,0,{project_id:"0",project_name:"Choose"});
                            $scope.project=$scope.projects[0];
                        }
                    else
                        {
                            $scope.projects.push({project_id:"0",project_name:"Choose"});
                        }
                 })

                $scope.BindCustomer=function(x){
                    $scope.customer_id=x.customer_id;
                    $scope.customer_name=x.customer_name;
                    $scope.project.project_id=x.project_id;
                    $scope.address=x.address;
                    $scope.phone_no=x.phone_no;
                    $scope.remark=x.remark;
                    $scope.showcustomer=false;
                }

                function ClearCustomer(){
                    $scope.customer_id=0;
                    $scope.customer_name=null;
                    $scope.project=$scope.projects[0];
                    $scope.address=null;
                    $scope.phone_no=null;
                    $scope.remark=null;
                }

                function CustomerValidation(){
                  if ($scope.customer_name==null || $scope.customer_name==undefined) 
                    {
                      alert("Required Customer Name");
                      return false;
                    }
                    else if ($scope.project.project_id=='0') 
                    {
                      alert("Select Project Name");
                      return false;
                    }
                    else if ($scope.phone_no==null || $scope.phone_no==undefined) 
                      {
                        alert("Required Phone No");
                        return false;
                      }
                      else if($scope.address==null || $scope.address==undefined)
                      {
                        alert("Required Address");
                        return false;
                      }
                      return true;
                }

                $scope.DeleteCusomter=function(x){
                    var deleted = confirm("Are you sure to delete?");
                    if ( deleted == true) {
                            $http.post("customer_query.php",{"customer_id":x.customer_id, "type":"delete"})
                            .then(function (response) {
                             $scope.l_hide=true;
                              alert("Delete Successful");
                              $scope.l_hide=false;
                              ClearCustomer();
                            $scope.customers=response.data.customers;
                            if (response.data.projects!="No record") 
                                {
                                    $scope.projects=response.data.projects;
                                    $scope.projects.splice(0,0,{project_id:"0",project_name:"Choose"});
                                    $scope.project=$scope.projects[0];
                                }
                            else
                                {
                                    $scope.projects.push({project_id:"0",project_name:"Choose"});
                                }
                            });
                    }
                }

                $scope.SaveCustomer=function(){
                  if (CustomerValidation()) 
                      {                      
                       $http.post("customer_query.php",{"customer_name":$scope.customer_name,"project_id":$scope.project.project_id,"address":$scope.address,
                                "userid":$scope.user_id,"phone_no":$scope.phone_no,"remark":$scope.remark,
                                "type":"save"})
                                .then(function (response) {
                                 $scope.alldata=response; 
                                 $scope.l_hide=true;     
                                 alert("Save successful");       
                                 $scope.l_hide=false;                          
                                     ClearCustomer();
                                     $scope.customers=response.data.customers;
                                        if (response.data.projects!="No record") 
                                            {
                                                $scope.projects=response.data.projects;
                                                $scope.projects.splice(0,0,{project_id:"0",project_name:"Choose"});
                                                $scope.project=$scope.projects[0];
                                            }
                                        else
                                            {
                                                $scope.projects.push({project_id:"0",project_name:"Choose"});
                                            }
                                });
                      }
                }

                $scope.EditCustomer=function(){
                  if (CustomerValidation) 
                      {
                         $http.post("customer_query.php",{"customer_name":$scope.customer_name,"project_id":$scope.project.project_id,"address":$scope.address,
                                    "userid":$scope.user_id,"phone_no":$scope.phone_no,"remark":$scope.remark,"customer_id":$scope.customer_id,  "type":"edit"})
                        .then(function (response) {
                            $scope.l_hide=false; 
                            alert("Edited successful");
                            $scope.l_hide=true; 
                            $scope.showcustomer=false;
                            ClearCustomer();
                            $scope.customers=response.data.customers;
                                if (response.data.projects!="No record") 
                                    {
                                        $scope.projects=response.data.projects;
                                        $scope.projects.splice(0,0,{project_id:"0",project_name:"Choose"});
                                        $scope.project=$scope.projects[0];
                                    }
                                else
                                    {
                                        $scope.projects.push({project_id:"0",project_name:"Choose"});
                                    }                        
                        });
                      }
                }

                $scope.CancelCustomer=function(){
                    $scope.showcustomer=true;
                }
    }   
    else{
       $("#mnbar").css("display","none");
       $location.path('/');  
    }         
       })
 .controller("projectController", function($scope, $http, $location) {
   if (window.localStorage.getItem("user_id")) {
    $("#heading").addClass("col-sm-8");
          $("#heading").removeClass("col-sm-4");  
          $("#heading").removeClass("col-sm-offset-4");
      $scope.user_id = window.localStorage.getItem("user_id");
      $("#mnbar").css("display","block");
         $http.post("project_query.php",{"type":"project", "btn":""})
                    .then(function (response) {
                      $scope.projects = response.data.projects;
                    });
             $scope.showproject=true;
            $scope.SavePorject = function(){
             if($scope.project_name != null && $scope.project_name != undefined){
                    $http.post("project_query.php",{"project_name":$scope.project_name, "userid":$scope.user_id, "type":"save"})
                        .then(function (response) {
                            $scope.projects = response.data.projects;
                            $scope.l_hide=true;
                            alert("Save Successful");
                            $scope.l_hide=false;
                        });
                        $scope.project_name = null;
              }
              else{
                alert("Please Fill Name.");
              }
            }
           $scope.DeleteProject = function(a){
                    var deleted = confirm("Are you sure to delete?");
                    if ( deleted == true) {
                            $http.post("project_query.php",{"project_id":a, "type":"delete"})
                            .then(function (response) {
                               $scope.l_hide=true;
                                alert("Deleted Successful");
                                $scope.l_hide=false;
                                $scope.projects = response.data.projects;
                            });
                    }
           }
           $scope.BindProject = function(a){
                    $scope.project_name = a.project_name;
                    $scope.project_id = a.project_id;
                    $scope.showproject=false;
            }
           $scope.EditProject = function(){
                    $http.post("project_query.php",{"project_name":$scope.project_name,"userid":$scope.user_id,  "project_id":$scope.project_id, "type":"edit"})
                    .then(function (response) {
                        $scope.alldata=response.data;
                        $scope.projects = response.data.projects;
                        $scope.l_hide=true;
                        alert("Successful Edit");
                        $scope.l_hide=false;
                    });
                    $scope.project_name = null;
                    $scope.showproject=true;
           } 
           $scope.CancelProject = function(){
            $scope.project_name = null;
            $scope.project_id=0;
             $scope.showproject=true;
           }
            }   
    else{
       $("#mnbar").css("display","none");
       $location.path('/');  
    }     
  })
 .controller("logoutController", function($location) {
  window.localStorage.removeItem("user_id");
  $("#mnbar").css("display","none");
      $location.path('/');         
})
  ;