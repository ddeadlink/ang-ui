<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="styles/style.css" rel="stylesheet">
    </head>
    <body ng-app="main" ng-controller="controller">

        <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        <h2>Main</h2>
                    </a>
                </li>
                <li>
                    <a ng-click="showPage();changeClass()" ng-class="class">Overview</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="native-brd" ng-if="showItems">
                            <h1>Items</h1>
                            <div class="form-inline native-form">

                            <div class="navbar-collapse">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control native-input" placeholder="Type name here..." ng-model="items.name">
                                    </div>
                                    <div class="col-lg-4">
                                        <button type="button" class="btn btn-primary native-btn front-btn clear-color pull-right" ng-click="addNew(items)">Add new</button>
                                    </div>
                                </div>
                            </div>

                              <div class="item-wrap navbar-collapse" ng-repeat="one in items">
                                  <div class="row">
                                      <div class="col-lg-6 native-item native-block" ng-click="showComments(one)" >
                                        <div class="pointer"></div>
                                        <p class="navbar-text">{{one.name}}</p>
                                        <span class="badge pull-right navbar-text count_comment">{{one.comments.length}}</span>
                                      </div>
                                      <div class="col-lg-6 native-item ">
                                        <button type="button" class="btn btn-primary navbar-btn rep-btn" ng-click="deleteItem(one)">Delete</button>
                                      </div>
                                  </div>
                              </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="native-brd comments-wrapper" ng-if="showComment">
                            <h1>Comments #{{existingItem.id}}</h1>

                            <div class="item-wrap comment-block navbar-collapse" ng-repeat="text in existingItem.comments track by $index">
                              <div class="row position-comment">
                                <div ng-class="$even ? 'col-lg-2 img-fake orange' : 'col-lg-2 img-fake blue'"></div>
                                  <div class="col-lg-10 native-item native-block">
                                    <p class="">{{text}}</p>
                                  </div>
                              </div>
                            </div>


                            <div class="navbar-collapse">
                                <div class="row">
                                    <div class="col-lg-2 img-fake"></div>
                                    <div class="col-lg-10 native-item ">
                                      <textarea class="form-control" rows="5" id="comment" ng-keyup="$event.keyCode == 13 && comment(existingItem,existingItem.newComment)" ng-model="existingItem.newComment"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.13.4/ui-bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.13.4/ui-bootstrap-tpls.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ngStorage/0.3.11/ngStorage.min.js"></script>

    <script src="/scripts/bootstrap.js"></script>
    <script src="/scripts/controller.js"></script>
</html>
