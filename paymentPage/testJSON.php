<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <script>

		let students = []
		let student1 = {};
		let student2 = {};

		student1.id = 1;
		student1.name = "franklin";
		student1.lastName = "jara";
		students.push(student1);

		student2.id = 2;
		student2.name = "Kim";
		student2.lastName = "XXX";
		students.push(student2);


		console.log(students);

		$.ajax({
			url: "readJson.php",
			method: "post",
			data: { students : JSON.stringify(students)},
			success: function(res) {
				console.log(res);
			}
		});
	</script>
</body>
</html>