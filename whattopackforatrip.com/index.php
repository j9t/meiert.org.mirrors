<?php
	// Variables

	if (($_POST["nights"] == "") && ($_GET["nights"] == "")) {
		$nights = 3;
	} else if ($_POST["nights"] != "") {
		$nights = htmlentities($_POST["nights"]);
	} else {
		$nights = htmlentities($_GET["nights"]);
	}

	if (!is_numeric($nights)) {
		$error = true;
		$errorMessageNights = "Where are you from, what number of nights is this?";
	}

	$nightsmax = "30";

	if ($_POST["climate"] != "") {
		$climate = htmlentities($_POST["climate"]);
	} else {
		$climate = htmlentities($_GET["climate"]);
	}

	$climateArray = array("", "moderate", "hot", "cold");
	if (!in_array($climate, $climateArray)) {
		$error = true;
		$errorMessageClimate = "That climate looks odd.";
	}

	if ($_POST["style"] != "") {
		$style = htmlentities($_POST["style"]);
	} else {
		$style = htmlentities($_GET["style"]);
	}

	$styleArray = array("", "neutral", "feminine-casual", "feminine-elegant", "masculine-casual", "masculine-elegant");
	if (!in_array($style, $styleArray)) {
		$error = true;
		$errorMessageStyle = "What style is this.";
	}

	$url = "https://" . $_SERVER["HTTP_HOST"] . "/whattopackforatrip.com/?nights=" . $nights . "&climate=" . $climate . "&style=" . $style . "&bookmark#checklist";

	$urlmax = "https://" . $_SERVER["HTTP_HOST"] . "/whattopackforatrip.com/?nights=" . $nightsmax . "&climate=" . $climate . "&style=" . $style . "&bookmark#checklist";

	// Crunches

	if ($nights < 3) {
		$nightssmall = &$nights;
	} else if ($nights > 9) {
		$nightssmall = "10";
	} else {
		$nightssmall = ($nights + 1);
	}

?>
<!DOCTYPE html>
<title>What to Pack for a Trip · Prepare Your Luggage in 3 Quick Steps</title>
<link rel=icon href=favicon.ico>
<link rel=stylesheet href=setup/default.min.css>
<meta name=viewport content="initial-scale=1,width=device-width">
<meta name=theme-color content=#fff>
<meta name=twitter:card content=summary>
<meta property=og:title content="What to Pack for a Trip · Prepare Your Luggage in 3 Quick Steps">
<meta property="og:description" name="description" content="Tired of calculating what clothes to pack when you travel somewhere? No more! Use What to Pack for a Trip to prepare, swiftly.">
<script src=setup/quarantine/jquery-3.7.1.slim.min.js></script>
<?php if ($error == "true") { ?>
<p id=error>Yo, geek. <?php echo $errorMessageNights; ?> <?php echo $errorMessageClimate; ?> <?php echo $errorMessageStyle; ?>
<?php } ?>
<h1><?php if ((isset($_POST["bookmark"])) || (isset($_GET["bookmark"]))) { ?><a href="./"><?php } ?>What to Pack for a Trip 🏖<?php if ((isset($_POST["bookmark"])) || (isset($_GET["bookmark"]))) { ?></a><?php } ?></h1>
<p>Tired of calculating what clothes to pack when you travel somewhere? No more!
<form action=./#checklist method=post>
	<input type=hidden name=bookmark>
	<label for=nights>How many nights are you going to be out?</label>
	<input type=number value=<?php echo $nights; ?> name=nights id=nights required>
	<label for=climate>What’s the climate like over there?</label>
	<select name=climate id=climate>
		<option value="moderate"<?php if ($climate == "moderate") { ?> selected<?php } ?>>moderate
		<option value="hot"<?php if ($climate == "hot") { ?> selected<?php } ?>>hot
		<option value="cold"<?php if ($climate == "cold") { ?> selected<?php } ?>>cold
	</select>
	<label for=style>What’s your fashion style?</label>
	<select name=style id=style>
		<option value="neutral"<?php if ($style == "neutral") { ?> selected<?php } ?>>neutral
		<option value="feminine-casual"<?php if ($style == "feminine-casual") { ?> selected<?php } ?>>feminine casual
		<option value="feminine-elegant"<?php if ($style == "feminine-elegant") { ?> selected<?php } ?>>feminine elegant
		<option value="masculine-casual"<?php if ($style == "masculine-casual") { ?> selected<?php } ?>>masculine casual
		<option value="masculine-elegant"<?php if ($style == "masculine-elegant") { ?> selected<?php } ?>>masculine elegant
	</select>
	<div><button>🤔 What do I pack?</button> <a href=./>Clear</a></div>
</form>
<?php if (($nights > $nightsmax) && ($error != "true")) { ?>
<h1 id=checklist>Yay! You’re Going on a Looong Trip! 😍😍</h1>
<p>Alas, it’s so long (<?php echo $nights; ?> nights! sweet jesus) you should better <a href=https://meiert.com/blog/the-law-of-travel/>pack light</a>. This isn’t something we can help with ✨
<p>(I don’t care. Give me <a href="<?php echo $urlmax; ?>">recommendations for <?php echo $nightsmax; ?> nights</a> then.)
<?php } else if (($nights != "") && ($climate != "") && ($style != "") && ($error != "true")) { ?>
<h1 id=checklist>Yay! You’re Going on a Trip! 😍</h1>
<p><?php if ($nights == 1) { ?>Oh, that’s short. <?php } ?>Here’s what we think you should bring for <?php echo $nights; ?> nights. (Checkbox values aren’t saved.)
<ul>
<?php if (($nights > 5) && (($style == "feminine-elegant") || ($style == "masculine-elegant"))) { ?>
	<li><label class=optional><input type=checkbox> 1 nice big suitcase</label>
<?php } else if ($nights > 5) { ?>
	<li><label class=optional><input type=checkbox> 1 big bag or suitcase</label>
<?php } else { ?>
	<li><label class=optional><input type=checkbox> 1 bag or suitcase</label>
<?php } ?>
	<li><label><input type=checkbox> <?php echo $nightssmall; ?> pairs of socks 👣</label>
	<li><label><input type=checkbox> <?php echo $nightssmall; ?> underpants</label>
<?php if ($nights < 5) { ?>
	<li><label><input type=checkbox> 1 pair of pants 👖<?php if (($style == "feminine-casual") || ($style == "feminine-elegant")) { ?> or dress 👗<?php } ?></label>
<?php } else if ($nights > 15) { ?>
	<li><label><input type=checkbox> 5 pairs of pants 👖<?php if (($style == "feminine-casual") || ($style == "feminine-elegant")) { ?> or dresses 👗<?php } ?></label>
<?php } else { ?>
	<li><label><input type=checkbox> <?php echo round($nights / 3); ?> pairs of pants 👖<?php if (($style == "feminine-casual") || ($style == "feminine-elegant")) { ?> or dresses 👗<?php } ?></label>
<?php } ?>
<?php if ($nights == 1) { ?>
	<li><label><input type=checkbox> <?php echo $nights; ?> shirt 👕<?php if (($style == "feminine-casual") || ($style == "feminine-elegant")) { ?> or top<?php } ?></label>
<?php } else if ($nights > 9) { ?>
	<li><label><input type=checkbox> 10 shirts 👕<?php if (($style == "feminine-casual") || ($style == "feminine-elegant")) { ?> or tops<?php } ?></label>
<?php } else { ?>
	<li><label><input type=checkbox> <?php echo $nights; ?> shirts 👕<?php if (($style == "feminine-casual") || ($style == "feminine-elegant")) { ?> or tops<?php } ?></label>
<?php } ?>
<?php if ($nights < 4) { ?>
	<li><label><input type=checkbox> 1 pullover</label>
<?php } else if ($nights > 6) { ?>
	<li><label><input type=checkbox> 3 pullovers</label>
<?php } else { ?>
	<li><label><input type=checkbox> 2 pullovers</label>
<?php } ?>
<?php if ($climate != "hot") { ?>
	<li><label><input type=checkbox> 1 <?php if (($style == "feminine-elegant") || ($style == "masculine-elegant")) { ?>coat<?php } else { ?>jacket<?php } ?></label>
<?php } ?>
<?php if ($nights > 5) { ?>
	<li><label><input type=checkbox> 2 pairs of shoes 👞 <?php if ($climate == "hot") { ?>(1 of them flip-flops<?php if ($style == "masculine-elegant") { ?> or loafers<?php } ?>)<?php } ?></label>
<?php } else { ?>
	<li><label><input type=checkbox> 1 pair of shoes 👞 <?php if ($climate == "hot") { ?>(perhaps flip-flops<?php if ($style == "masculine-elegant") { ?> or loafers<?php } ?>)<?php } ?></label>
<?php } ?>
<?php if ($climate == "cold") { ?>
	<li><label><input type=checkbox> 1 or more pairs of gloves and such ⛄</label>
<?php } ?>
<?php if (($style == "feminine-elegant") || ($style == "masculine-elegant")) { ?>
	<li><label class=optional><input type=checkbox> At least 1 hat 👒, that would look quite nice on you</label>
	<li><label class=optional><input type=checkbox> At least some accessories<?php if ($style == "masculine-elegant") { ?>, like 1 or more ties 👔<?php } ?></label>
<?php } ?>
	<li><label class=optional><input type=checkbox> Gear for extra activities (swimming 👙, diving, running, climbing, …)</label>
	<li><label class=optional><input type=checkbox> Keys, wallet, and passport 😬</label>
</ul>
<?php if ($nights > 9) { ?>
<p class=info>⚠ If you’re out for 10 or more nights we assume you do laundry and don’t want to pack so much.
<?php } ?>
<p class=info>⚠ The recommendations don’t include what you’d wear when you start your journey, so you’ll have a little extra with you.
<p><?php if ((isset($_POST["bookmark"])) || (isset($_GET["bookmark"]))) { ?><a href="<?php echo htmlentities($url); ?>">Direct link to this wardrobe</a> · <?php } ?><a href="./">Start over</a>
<?php } ?>
<footer>
	<p><small>Contact: <a href="https://meiert.com/">Jens Oliver Meiert</a> (<a href="https://meiert.com/contact/">Pontevedra, Spain</a>) · <a href=mailto:info@meiert.com>info@meiert.com</a> · <a href=tel:+34-610859489>+34-610859489</a></small>
</footer>
<?php if (($climate != "") && ($style != "")) { ?>
<script>
	$(document).ready(function () {
		$('#climate').val('<?php echo $climate; ?>').focus();
		$('#style').val('<?php echo $style; ?>').focus();
	});
</script>
<?php } ?>