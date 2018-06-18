<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <script src="js/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/angular.min.js"></script>
    <script src="js/angular-route.js"></script>
    <script src="js/angular-base64.js"></script>
    <link href="css/jquery-ui.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body ng-app="ngRoutingDemo">
     <div class="col-xs-12 pad-free" id="menubar" >
     <div class="col-sm-8" id="heading">
         <img src="images/cusheader.png" class="img-responsive" style="">
     </div>
        
         <!-- <h1 class="col-sm-8">Customer History</h1> -->
         <!-- ng-hide="currentPath === '#/'  -->
         <div class="col-xs-12 col-sm-4" style="margin-top:10px;" id="mnbar">
             <div class="col-xs-4 col-sm-offset-3 col-sm-3" >
             <a href="#customer/" title="Customer">
                 <img src="images/c.png" class="col-sm-12 pad-free img-responsive" >
             </a>                 
             </div>
             <div class="col-xs-4 col-sm-3" title="Project">
             <a href="#project/">
                   <img src="images/p.png" class="col-sm-12 pad-free img-responsive"> 
             </a>
             </div>
             <div class="col-xs-4 col-sm-3" title="Log Out">
             <a href="#logout/">
                 <img src="images/l.png" class="col-sm-12 pad-free img-responsive">
             </a>
             </div>             
         </div>
     </div>
    <div ng-view>

    </div>
    <script src="js/controller.js"></script>
     <script src="js/app.js"></script>
</body>
</html>

