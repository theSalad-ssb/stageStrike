var stages={};
stages.ys=true;
stages.cs=true;
stages.fd=true;
stages.kpl=true;
stages.lc=true;
stages.mg=true;
stages.sv=true;
stages.tc=true;
stages.upl=true;
stages.yi=true;
stages.ps2=true;
var bannedStages={};
bannedStages.ys=false;
bannedStages.cs=false;
bannedStages.fd=false;
bannedStages.kpl=false;
bannedStages.lc=false;
bannedStages.mg=false;
bannedStages.sv=false;
bannedStages.tc=false;
bannedStages.upl=false;
bannedStages.yi=false;
bannedStages.ps2=false;
var banNeed=2;
var gameNum=1;
$(document).ready(function(){
	document.getElementById('goodName').value="BBBB";
	document.getElementById('goodUname').value="BBBB";
	document.getElementById('goodCode').value="BBBB#0000";
	if(getCookie("username")==undefined){
		document.getElementById("login").style="display:inline";
	}
	else{
		document.getElementById("realPage").style="display:inline";
	}
	if(gameNum==1){
	document.getElementById("strikeBan").innerHTML="Strike";
}
});
function login(){
	$.post("https://stageStrike.thesalad.repl.co",{purpose:"login",user:document.getElementById("uname").value,ccode:document.getElementById("ccode").value},function(data){
		console.log(data);
	});
}
function makeNew(){
	document.getElementById("newAcct").style="display:inline";
	document.getElementById("login").style="display:none";
}
function submitNew(){
	//POST new details to server, make a new account there, tell user their connect code, set connect code and uname as cookies
}
function submitStrike(){
	//POST the strikes to the server
}
function isValidCode(id){
	const check=document.getElementById(id).value;
	if(check==""||!check.includes("#")){
		return false;
	}
	var numbers=check.substring(check.indexOf('#')+1);
	var letters=check.substring(0,check.indexOf('#'));
	if(letters!=""&&isLetters(letters)&&numbers.length==4&&isNumbers(numbers)){
		return true;
	}
	return false;
}
function isValidName(id){
	const check=document.getElementById(id).value;
	if(check!=""&&isLetters(check)){
		return true;
	}
	return false;
}
function isValidUname(id){
	if(document.getElementById(id).value!=""){
		return true;
	}
	return false;
}
function checkValid(unameId,ccodeId,nameId,buttonId){
	document.getElementById(buttonId).disabled=!(isValidCode(ccodeId)&&isValidUname(unameId)&&isValidName(nameId));
	return isValidCode(ccodeId)&&isValidUname(unameId)&&isValidName(nameId);
}
function isNumbers(check){
	var i=0;
	for(i=0;i<check.length;i++){
		if(check.charCodeAt(i)<48||check.charCodeAt(i)>57){
			return false;
		}
	}
	return true;
}
function isLetters(check){
	check=check.toLowerCase();
	var i=0;
	for(i=0;i<check.length;i++){
		if(check.charCodeAt(i)<97||check.charCodeAt(i)>122){
			return false;
		}
	}
	return true;
}
function getCookie(name){
	const cookies=document.cookie;
	var cookieArray=cookies.split(';');
	var i=0;
	var curEl;
	for(i=0;i<cookieArray.length;i++){
		curEl=cookieArray[i];
		if(curEl.substring(0,curEl.indexOf("="))==name){
			return curEl.substring(curEl.indexOf("=")+1,curEl.indexOf(";"));
		}
	}
	return undefined;
}
function setCookie(name, value){
	const oldCookie=document.cookie;
	if(getCookie(name)==undefined){
		document.cookie=oldCookie+name+"="+value+";";
		return;
	}
	document.cookie=oldCookie.substring(oldCookie.indexOf(name));
	document.cookie=oldCookie.substring(0,oldCookie.indexOf(name))+name+"="+value+";"+document.cookie.substring(document.cookie.indexOf(";")+1);
}
function banToggle(id){
	if(bannedStages[id]==false&&stages[id]==true&&totalFalse()<banNeed){
		stages[id]=false;
		document.getElementById(id).classList.add("banned");
	}
	else if(stages[id]==false){
		stages[id]=true;
		document.getElementById(id).classList.remove("banned");
	}
	if(totalFalse()==banNeed){
		document.getElementById("stages").style="cursor:not-allowed !important";
	}
	else{
		document.getElementById("stages").style="cursor:pointer !important";
	}
}
function totalFalse(){
	var total=0;
	for(var i in stages){
		if(stages[i]==false){
			total++;
		}
	}
	return total;
}