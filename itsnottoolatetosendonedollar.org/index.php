<?php
	$charity1Text = " World Vision";
	$charity1Url = "https://donate.worldvision.org/gift-catalog/education";
	$charity2Text = " UNESCO";
	$charity2Url = "http://www.unesco.org/donate/";
	$charity3Text = " charity: water";
	$charity3Url = "https://www.charitywater.org/donate";
	$charity4Text = " the International Campaign to Ban Landmines";
	$charity4Url = "http://www.icbl.org/en-gb/about-us/donate.aspx";
	$charity5Text = " the Electronic Frontier Foundation";
	$charity5Url = "https://supporters.eff.org/donate";
	$charity6Text = " the International Committee of the Red Cross";
	$charity6Url = "\"https://www.icrc.org/eng/donations/?o=421431&c=USD&a=10&utm_source=itsnottoolatetosendonedollar&utm_medium=affiliate&utm_campaign=one%20dollar%20campaign\"";
	$charity7Text = " the Sea Shepherd Conservation Society";
	$charity7Url = "https://seashepherd.org/donate/";
	$charity8Text = " Parliamentarians for Nuclear Non-Proliferation and Disarmament";
	$charity8Url = "http://www.pnnd.org/donate";
	$charity9Text = " Public Citizen";
	$charity9Url = "https://publiccitizen.salsalabs.org/donate/";
	// Bonus
	$charity10Text = " Médecins Sans Frontières";
	$charity10Url = "https://www.msf.org/donate";

	$charitySelector = rand(1,10);
	$charityText = ${"charity" . $charitySelector . "Text"};
	$charityUrl = ${"charity" . $charitySelector . "Url"};
?>
<!DOCTYPE html>
<title>It’s not too late to send $1</title>
<link rel=icon href=favicon.ico>
<link rel=stylesheet href=setup/default.css>
<meta name=viewport content="initial-scale=1,minimum-scale=1,width=device-width">
<p><b>It’s not too late</b> to <a href=<?php echo $charityUrl; ?>>send $1 to<?php echo $charityText; ?></a>.</p>
<small>A randomized reproduction of an <a href="https://books.google.com/books?id=hf7mBAAAQBAJ&pg=PT30&lpg=PT30&dq=%22it’s+not+too+late+to+send+$1%22">old newspaper ad</a> (<a href=./>reload</a>). Another playful project by <a href=https://meiert.com/en/>Jens</a>, who’s only affiliated with himself.</small>