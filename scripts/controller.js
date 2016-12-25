
angular.module('main').controller('controller',function($scope,$localStorage){


    $scope.showPage = function(){
        $scope.showItems = true;
    };
    $scope.class = "";
    $scope.changeClass = function(){
        if ($scope.class === ""){
            $scope.class = "clicked";
        } else {
            $scope.class = "";
        }
     };

    if ($scope.items == undefined && $localStorage.items == undefined){
      $scope.items = [];
    } else {
      $scope.items = $localStorage.items;
    }

    $scope.addNew = function(item){
        $scope.items.push({'name':item.name,'comments':[]});
        $localStorage.items = $scope.items;
        // spike, cuz 've got no idea how to set id from nothing
        if ($localStorage.items[$localStorage.items.length-2] == undefined){
          $localStorage.items[$localStorage.items.length-1].id = 1;
        } else {
          $localStorage.items[$localStorage.items.length-1].id = $localStorage.items[$localStorage.items.length-2].$$hashKey.split(':')[1];
        }
        $scope.items.name = '';
    };

    $scope.deleteItem = function(one){
      var leftItems = $scope.items.filter(function(item){
        return item !== one;
      });
      $localStorage.items = leftItems;
      $scope.items = $localStorage.items;
      if (one == $scope.existingItem){
        $scope.showComment = false;
      }
    }

    $scope.showComments = function(one){
        $scope.pointer = true;
        $scope.showComment = true;
        $scope.existingItem = one;
    };

    $scope.closeComment = function(newComment){
      $scope.newComment = '';
    }

    $scope.comment = function(existingItem,newComment){
      existingItem.comments.push(newComment);
      $scope.existingItem.newComment = '';
    }

})
