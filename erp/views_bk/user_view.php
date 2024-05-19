<!DOCTYPE html>
<html lang="en">
<head>
 <!-- AngularJS -->
<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.2/angular.min.js"></script>
</head>
<body ng-app='myapp'>

  <div ng-controller='userCtrl'>
    <!-- User Records -->
    <table border='1' style='border-collapse: collapse;'>
      <thead>
       <tr>
        <th>Username</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
     <tr ng-repeat='user in users'>
       <td>{{ user.USERNAME }}</td>
       <td>{{ user.FULL_NAME }}</td>
       <td>{{ user.ROLE_ID }}</td>
       <td>{{ user.EMAIL }}</td>
     </tr>
    </tbody>
  </table>
 </div>

 <!-- Script -->
 <script>
 var fetch = angular.module('myapp', []);

 fetch.controller('userCtrl', ['$scope', '$http', function ($scope, $http) {
 
   $scope.getUsers = function(){
    $http({
     method: 'get',
     url: '<?= base_url() ?>index.php/abc/getUsers'
    }).then(function successCallback(response) {
      // Assign response to users object
	  //alert(response);
      $scope.users = response.data;
    }); 
   }
   $scope.getUsers();
 }]);

 </script>

</body>
</html>