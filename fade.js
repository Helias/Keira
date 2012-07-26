function opacity()
{
	for (var i=0; i<document.getElementsByTagName("td").length; i++)
	{
		setTimeout('document.getElementsByTagName("td")['+i+'].style.opacity="0.2";', 200);
		setTimeout('document.getElementsByTagName("td")['+i+'].style.opacity="0.3";', 250);
		setTimeout('document.getElementsByTagName("td")['+i+'].style.opacity="0.4";', 300);
		setTimeout('document.getElementsByTagName("td")['+i+'].style.opacity="0.5";', 350);
		setTimeout('document.getElementsByTagName("td")['+i+'].style.opacity="0.6";', 400);
		setTimeout('document.getElementsByTagName("td")['+i+'].style.opacity="0.7";', 450);
		setTimeout('document.getElementsByTagName("td")['+i+'].style.opacity="0.8";', 500);
		setTimeout('document.getElementsByTagName("td")['+i+'].style.opacity="0.9";', 550);
		setTimeout('document.getElementsByTagName("td")['+i+'].style.opacity="1";', 600);
	}
	
	var object=document.getElementsByClassName("scroll")[0];
	setTimeout('document.getElementsByClassName("scroll")[0].style.opacity="0.2";', 200);
	setTimeout('document.getElementsByClassName("scroll")[0].style.opacity="0.3";', 250);
	setTimeout('document.getElementsByClassName("scroll")[0].style.opacity="0.4";', 300);
	setTimeout('document.getElementsByClassName("scroll")[0].style.opacity="0.5";', 350);
	setTimeout('document.getElementsByClassName("scroll")[0].style.opacity="0.6";', 400);
	setTimeout('document.getElementsByClassName("scroll")[0].style.opacity="0.7";', 450);
	setTimeout('document.getElementsByClassName("scroll")[0].style.opacity="0.8";', 500);
	setTimeout('document.getElementsByClassName("scroll")[0].style.opacity="0.9";', 550);
	setTimeout('document.getElementsByClassName("scroll")[0].style.opacity="1";', 600);
}