$(function() {
	var id = $('#msg').val();
	$.ajax({
		type: "get",
		url: "../php/showMessage.php?id=10&msg=" + id,
		async: true,
		success: function(data) {
			var json = JSON.parse(data);
			var list = json.list;
			$.each(list, function(index, array) {

				$('#name').val(array['name']);
				$("#sex").val(array['sex']);
				$('#age').val(array['age']);
				$('#qq').val(array['qq']);
				$('#tel').val(array['tel']);
				$('#hospital').val(array['hospital']);
				$('#evaluate').val(array['evaluate']);
				$('#reason').val(array['reason']);
			});

			/*$('#name').val(json.name);
			$("#sex").val(json.sex);
			$('#age').val(json.age);
			$('#qq').val(json.qq);
			$('#tel').val(json.tel);
			$('#hospital').val(json.hospital);
			$('#evaluate').val(json.evaluate);
			$('#reason').val(json.reason);*/
		},
		error: function(msg) {
			alert(msg.status);
		}
	});
});