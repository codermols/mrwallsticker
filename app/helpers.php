<?php

function flash($title = null, $message = null)
{
	$flash = app('App\Http\Flash');

	if (func_num_args() == 0) {
		return $flash;
	}

	return $flash->message($title, $message);
}

function ratingToStars($rating)
{
	// $rating = round($rating);
	// dd($rating, .5);

	switch($rating) {
		case 1:
			echo '
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star-o"></span>
				<span class="fa fa-star-o"></span>
				<span class="fa fa-star-o"></span>
				<span class="fa fa-star-o"></span>
			';
			break;
		case 1.5:
			echo '
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star-half-o"></span>
				<span class="fa fa-star-o"></span>
				<span class="fa fa-star-o"></span>
				<span class="fa fa-star-o"></span>
			';
			break;
		case 2:
			echo '
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star-o"></span>
				<span class="fa fa-star-o"></span>
				<span class="fa fa-star-o"></span>
			';
			break;
		case 2.5:
			echo '
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star-half-o"></span>
				<span class="fa fa-star-o"></span>
				<span class="fa fa-star-o"></span>
			';
			break;
		case 3:
			echo '
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star-half-o"></span>
				<span class="fa fa-star-o"></span>
			';
			break;
		case 3.5:
			echo '
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star-half-o"></span>
				<span class="fa fa-star-o"></span>
			';
			break;
		case 4:
			echo '
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star-o"></span>
			';
			break;
		case 4.5:
			echo '
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star-half-o"></span>
			';
			break;
		case 5:
			echo '
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
			';
			break;
	}

}
