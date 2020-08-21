<?php echo hi
?>
<html>
	<head>
		<title>Strike your stages</title>
		<meta charset="utf8">
		<style>
			.banned{
				-webkit-filter: grayscale(100%);
				filter: grayscale(100%);
				cursor:pointer !important;
			}
			.otherBanned{
				-webkit-filter: grayscale(100%);
				filter: grayscale(100%);
				cursor:not-allowed;
			}
		</style>
	</head>
	<body>
		<script src="jquery-3.5.1.min.js"></script>
		<script src="main.js"></script>
		<input type="text" style="display:none" id="goodName">
		<input type="text" style="display:none" id="goodUname">
		<input type="text" style="display:none" id="goodCode">
		<div id="login" style="display:none">
			<h3>Login</h3>
			<form action="https://stageStrike.thesalad.repl.co" method="post" enctype="multipart/form">
			<input type="text" name="purpose" id="logPurp" style="display:none" readonly>
			<label for="uname">Username: (max 15 characters)</label>
			<input id="uname" name="uname" type="text" maxlength="15" onchange="checkValid('uname','ccode','goodName','loginB')"required><br>
			<label for="ccode">Connect Code:</label>
			<input type="text" id="ccode" name="ccode" placeholder="NAME#0000" maxlength="9" onchange="checkValid('uname','ccode','goodName','loginB');" required><br>
			<button type="submit" id="loginB" disabled>Login!</button><br>
			</form>
			<h3>OR</h3><br>
			<button onclick="makeNew()">Create Account</button>
		</div>
		<div id="newAcct" style="display:none">
			<h3>Create Account</h3>
			<form action="https://stageStrike.thesalad.repl.co" method="post" enctype="multipart/form">
			<input type="text" name="purpose" id="acctPurp" style="display:none" readonly>
			<label for="newUname">Username: (max 15 characters)</label>
			<input type="text" name="uname" id="newUname" maxlength="15" onchange="checkValid('newUname','goodCode','newCode','newAcctB');" required><br>
			<label for="newCode">Short Connect Name: (1-4 characters)</label>
			<input type="text" id="newCode" maxlength="4" name="short" onchange="checkValid('newUname','goodCode','newCode','newAcctB');" required>
			<button type="submit" id="newAcctB" disabled>Create Account!</button>
			</form>
		</div>
		<div id="realPage" style="display:none">
			<h1>Your Connect Code:<span id="codeHere"></span></h3>
			<input type="text" name="purpose" id="codePurp" style="display:none" readonly>
			<label for="otherCode">Opponent's Connect Code:</label>
			<input type="text" placeholder="NAME#0000" id="oppCode" maxlength="9">
			<button onclick="search()" id="realPageB" disabled>Search!</button>
		</div>
		<div id="stages" style="display:inline">
			<h3>Choose Stages To <span id="strikeBan"></span></h3><br>
			<span id="starters">
				<img src="ys.jpg" id="ys" onclick="banToggle('ys');">
				<img src="sv.jpg" id="sv" onclick="banToggle('sv');">
				<img src="tc.jpg" id="tc" onclick="banToggle('tc');">
				<img src="kpl.jpg" id="kpl" onclick="banToggle('kpl');">
				<img src="ps2.jpg" id="ps2" onclick="banToggle('ps2');">
			</span><br>
			<span id="cp" style="display:none">
				<img src="cs.jpg" id="cs" onclick="banToggle('cs');">
				<img src="yi.jpg" id="yi" onclick="banToggle('yi');">
				<img src="lc.jpg" id="lc" onclick="banToggle('lc');">
				<img src="fd.jpg" id="fd" onclick="banToggle('fd');">
				<img src="upl.jpg" id="upl" onclick="banToggle('upl');">
				<img src="mg.jpg" id="mg" onclick="banToggle('mg');">
			</span>
			<br><button onclick="submitStrike()">Submit!</button>
			<form action="https://stageStrike.thesalad.repl.co" method="post" style="display:none">
				<input type="text" id="stagePurp" name="purpose">
				<input type="checkbox" id="ysC" name="ys">
				<input type="checkbox" id="svC" name="sv">
				<input type="checkbox" id="tcC" name="tc">
				<input type="checkbox" id="kplC" name="kpl">
				<input type="checkbox" id="ps2C" name="ps2">
				<input type="checkbox" id="csC" name="cs">
				<input type="checkbox" id="yiC" name="yi">
				<input type="checkbox" id="lcC" name="lc">
				<input type="checkbox" id="fdC" name="fd">
				<input type="checkbox" id="uplC" name="upl">
				<input type="checkbox" id="mgC" name="mg">
				<input type="submit" id="stageFormSub">
				<input type="reset" id="stageReset">
			</form>
		</div>
		<script type="text/javascript">
			document.getElementById("logPurp").value="login";
			document.getElementById("acctPurp").value="acct";
			document.getElementById("codePurp").value="code";
			document.getElementById("stagePurp").value="stages";
		</script>
	</body>
</html>