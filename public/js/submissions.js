function SubmissionsController($scope, $https) {

	$scope.submissions = $https.get('pullSubmissions');

}