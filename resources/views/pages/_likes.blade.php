@section('_likes')

	<script>
	
		
			function likeIt(commentId, elem){
				var csrfToken='{{csrf_token()}}';
				var likesCount = parseInt($('#' + commentId + "-count").text());
				$.post('{{route('toggleLike')}}', {commentId: commentId, _token: csrfToken}, function(data){
					console.log(data);
					if (data.message === 'liked') {

						$(elem).addClass('liked');
						$('#' + commentId + "-count").text(likesCount + 1);
						$(elem).css('color', 'red');
					} else {
						$(elem).css('color', 'black');
						
					}
				});
			}


	</script>







@stop