<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/classes/favorite.php');


//checks which of the buttons is clicked
if(isset($_POST['addFavorite']))
{
	$favoriteId = $_POST['addFavorite'];
	addFavorite($_SESSION['userId'],$favoriteId);
}
elseif (isset($_POST['removeFavorite']))
{
	$favoriteId = $_POST['removeFavorite'];
	removeFavorite($favoriteId);
}

//add a favorite
function addFavorite($userid,$favoriteid)
{
	$favorite = new favorite;
	$result = $favorite->addFavorite($userid,$favoriteid);
}

//removes a favorite
function removeFavorite($favoriteid)
{
	$favorite = new favorite;
	$result = $favorite->removeFavorite($favoriteid);
}

?>