function closeRightClickList()
{
	var rightClickDiv = document.getElementById('rightClickList');
	rightClickDiv.style.cssText = 'display: none;';
}

function rightClickList(event)
{
	var MainCanvas = document.getElementById('MainCanvas');
	var x=event.pageX - MainCanvas.offsetLeft;
	var y=event.pageY - MainCanvas.offsetTop;
	var rightClickDiv = document.getElementById('rightClickList');
	rightClickDiv.style.cssText = 'display: visible; background-color:#6E6E6E; position: absolute; left: ' + x + 'px; top: ' + y + 'px;';
}

var keys = [];
window.addEventListener("keydown",
    function(e){
        keys[e.keyCode] = true;
        switch(e.keyCode){
            case 38:  case 40: // Arrow keys
            e.preventDefault(); break; // Space
            default: break; // do not block other keyms
        }
    },
false);
window.addEventListener('keyup',
    function(e){
        keys[e.keyCode] = false;
    },
false);

var bWait=false;
function checkArrowKeys(e){
    if (bWait) return;
    var arrs= [], key= window.event? event.keyCode: e.keyCode;
    arrs[37]= 'left';
    arrs[38]= 'up';
    arrs[39]= 'right';
    arrs[40]= 'down';
    if(arrs[key]){
        transition(arrs[key]);
    }
    bWait=true; //wait for 10 milliseconds
    window.setTimeout("bWait=false;",100);
}
document.onkeydown=checkArrowKeys;


var timetime;
function loadMap(){
	
	data = "action=LoadMap";

	evalpostAJAXHtml("travelupdate.php",data);

	timetime = setTimeout("loadMap();", 100);

}

function transition(direction){
    data = "direction=" + direction;
    evalpostAJAXHtml("travelmove.php",data);
}

function openTeleporter(){
    xcord = $("xCoord").value;
	ycord = $("yCoord").value;
    data = "xcord=" + xcord + "&ycord=" + ycord;
    evalpostAJAXHtml("teleport.php",data);
}

function updateTax(){
    amount = $("taxamount").value;
    data = "amount=" + amount;
    evalpostAJAXHtml("updatetax.php",data);
}

function preset(what){
	data = "action=" + what;
    evalpostAJAXHtml("spellsPreset.php",data);
}

function closeSecondPage(){
	clearTimeout(timetime);
	fillDiv('secondPage','');
}

function clearRewards(){
	fillDiv('rewardPopup','');
}

function help(showhide){
  if(showhide == "show"){
      document.getElementById('popupbox').style.visibility="visible";
  }else if(showhide == "hide"){
      document.getElementById('popupbox').style.visibility="hidden"; 
  }
}

function useItem(itemid){
    data = "itemid=" + itemid;
    evalpostAJAXHtml("useitem.php",data);
}

function craftForge(ore){
    data = "ore=" + ore;
    evalpostAJAXHtml("forgecraft.php",data);
}

function getResults(){
    ore = $("ore").value;
    data = "ore=" + ore;
	fillDiv('forgeResults','<center><i>Getting forge results...</i></center>');
    evalpostAJAXHtml("forgeresults.php",data);
}

function removeItem(itemid){
    data = "itemid=" + itemid;
    evalpostAJAXHtml("forgeremove.php",data);
}

function addItem(itemid){
    data = "itemid=" + itemid;
    evalpostAJAXHtml("forgeadd.php",data);
}

function openItem(){
    itemid = $("item").value;
    data = "itemid=" + itemid;
    evalpostAJAXHtml("forgedescription.php",data);
}

function verifyCaptcha(){
    recaptcha_Challenge_field = $("recaptcha_challenge_field").value;
	recaptcha_Response_field = $("recaptcha_response_field").value;
    data = "recaptcha_challenge_field=" + recaptcha_Challenge_field + "&recaptcha_response_field=" + recaptcha_Response_field;
    evalpostAJAXHtml("captchaverify.php",data);
}

function topGuilds(){
    evalpostAJAXHtml("topguilds.php",data);
}

function mineOre(id){
    data = "oreid=" + id;
    evalpostAJAXHtml("mineore.php",data);
}

function spellDesc(){
    spellid = $("spell").value;
    data = "spellid=" + spellid;
    evalpostAJAXHtml("spelldescription.php",data);
}

function tradeDesc(){
    tradeid = $("item").value;
    data = "tradeid=" + tradeid;
    evalpostAJAXHtml("tradedescription.php",data);
}

function retractGuild(){
    evalpostAJAXHtml("retract.php",data);
}

function itemDesc(){
    itemid = $("item").value;
    data = "itemid=" + itemid;
    evalpostAJAXHtml("itemdescription.php",data);
}

function buyDesc(){
    buyid = $("buyid").value;
    data = "buyid=" + buyid;
    evalpostAJAXHtml("buydescription.php",data);
}

function buyType(){
    buytype = $("type").value;
    data = "buytype=" + buytype;
    evalpostAJAXHtml("buytype.php",data);
}

function buyStyle(){
    buystyle = $("style").value;
    data = "buystyle=" + buystyle;
    evalpostAJAXHtml("buystyle.php",data);
}

function sellDesc(){
    sellid = $("sellid").value;
    data = "sellid=" + sellid;
    evalpostAJAXHtml("selldescription.php",data);
}

function cancelScavenge(id){
    data = "adventureid=" + id;
    evalpostAJAXHtml("cancelscavenger.php",data);
}

function orderBy(answer){
    data = "orderBy=" + answer;
    evalpostAJAXHtml("viewtop.php",data);
}

function changeUsername(){
    username = $("newUsername").value;
    data = "newUsername=" + username;
    evalpostAJAXHtml("changeusername.php",data);
}

function attackFight(){
    evalpostAJAXHtml("fightplayer.php",data);
}

function acceptFight(){
    evalpostAJAXHtml("acceptfight.php",data);
}

function declineFight(){
    evalpostAJAXHtml("declinefight.php",data);
}

function requestFight(char){
    data = "charrequesting=" + char;
    fillDiv('displayArea','<center><i>Requesting fight...</i></center>');
    evalpostAJAXHtml("requestfight.php",data);
}

function goDuelGround(answer){
    data = "goDuelGround=" + answer;
    evalpostAJAXHtml("move.php",data);
}

function answerFAQ(id){
    data = "id=" + id;
    evalpostAJAXHtml("answerfaq.php",data);
}

function completeScavenge(id){
    data = "adventureid=" + id;
    evalpostAJAXHtml("completescavenger.php",data);
}

function startScavenge(){
    enemyid = $("enemylist").value;
    data = "enemyid=" + enemyid;
    evalpostAJAXHtml("scavenger.php",data);
}

function changeClass(){
    data = "change=yes";
    evalpostAJAXHtml("changeclass.php",data);
}

function showAll(answer){
    data = "showAll=" + answer;
    evalpostAJAXHtml("viewtop.php",data);
}

function giveGold(){
	toUsername = $("toUsername").value;
	giveAmount = $("giveAmount").value;
    data = "toUsername=" + toUsername + "&giveAmount=" + giveAmount;
    evalpostAJAXHtml("givegold.php",data);
}

function changePassword(){
	opass = $("opass").value;
	npass = $("npass").value;
	npass2 = $("npass2").value;
    data = "opass=" + opass + "&npass=" + npass + "&npass2=" + npass2;
    evalpostAJAXHtml("editaccount.php",data);
}

function changeEmail(){
	oemail = $("oemail").value;
	nemail = $("nemail").value;
	nemail2 = $("nemail2").value;
    data = "oemail=" + oemail + "&nemail=" + nemail + "&nemail2=" + nemail2;
    evalpostAJAXHtml("editaccount.php",data);
}

function putCash(){
	price = $("price").value;
    data = "price=" + price + "&type=Cash";
    evalpostAJAXHtml("viewtrade.php",data);
}

function voteReward(reward){
    data = "reward=" + reward;
    evalpostAJAXHtml("vote.php",data);
}

function vote(link){
    data = "link=" + link;
    evalpostAJAXHtml("vote.php",data);
}

function grabBag(bagid){
    data = "bagid=" + bagid;
    evalpostAJAXHtml("openbag.php",data);
}

function runRainbow(){
    newcolor = $("newcolor").value;
    fillDiv('displayArea','<center>Brainblast!</center>');
    data = "newcolor=" + newcolor;
    evalpostAJAXHtml("editaccount.php",data);
}

var fightWait=false;
function fightEnemy(){
	if (fightWait) return;
    enemyid = $("enemylist").value;
    data = "enemyid=" + enemyid + "&auto=No";
    evalpostAJAXHtml("fightenemy.php",data);
	fillDiv('fightingButton','');
	fightWait=true; //wait for 1 seconds
    window.setTimeout("fightWait=false;",1000);
}

function autoFightEnemy(){
	if (fightWait) return;
    enemyid = $("enemylist").value;
    data = "enemyid=" + enemyid + "&auto=Yes";
    evalpostAJAXHtml("fightenemy.php",data);
	fillDiv('fightingButton','');
	fightWait=true; //wait for 2 seconds
    window.setTimeout("fightWait=false;",2000);
}

function stopAuto(){
    evalpostAJAXHtml("stopauto.php",data);    
}

var attackWait=false;
function attackEnemy(){
	if (attackWait) return;
    fillDiv('displayArea','<center>Attacking...</center>');
    attackType = "Attack";
    data = "attackType=" + attackType;
    evalpostAJAXHtml("attackenemy.php",data);
	attackWait=true; //wait for 10 milliseconds
    window.setTimeout("attackWait=false;",1000);
}

function runAway(){
    data = "Action=Run";
    evalpostAJAXHtml("run.php",data);
}

function raiseStat(){
    statChoice = $("statchoice").value;
    statAmount = $("amount").value;
    fillDiv('displayArea','<center>Raising Stat...</center>');
    data = "statChoice=" + statChoice + "&statAmount=" + statAmount;
    evalpostAJAXHtml("raisestat.php",data);
}

function runTransaction(){
    depositAmount = $("depositamount").value;
    withdrawAmount = $("withdrawamount").value;
    fillDiv('displayArea','<center>Please wait while transactions are made...</center>');
    data = "depositAmount=" + depositAmount + "&withdrawAmount=" + withdrawAmount;
    evalpostAJAXHtml("updategold.php",data);
}

function runVodoo(){
    Whom = $("whom").value;
    What = $("what").value;
    fillDiv('displayArea','<center>Please wait while I contact the other side...</center>');
    data = "what=" + What + "&whom=" + Whom;
    evalpostAJAXHtml("vodoo.php",data);
}

function makeDonation(){
    amountDonate = $("amount").value;
    fillDiv('displayArea','<center>You are dropping gold into the donation booth...</center>');
    data = "amount=" + amountDonate;
    evalpostAJAXHtml("temple.php",data);
}

function runCashOperation(cashOption){
    data = "cashoption=" + cashOption;
    evalpostAJAXHtml("spendcash.php",data);
}

function ressurectChar(){
    data = "action=Ressurect";
    evalpostAJAXHtml("ressurect.php",data);
}

function equip(itemid){
    data = "itemid=" + itemid;
    evalpostAJAXHtml("equip.php",data);
}

function unequip(itemid){
    data = "itemid=" + itemid;
    evalpostAJAXHtml("unequip.php",data);
}

function sell(sellid){
    data = "sellid=" + sellid;
    evalpostAJAXHtml("viewshop.php",data);
}

function buyItem(itemid){
    data = "itemid=" + itemid;
    evalpostAJAXHtml("viewshop.php",data);
}

function createGuild(){
    guildname = $("guildname").value;
    guildtag = $("guildtag").value;
    data = "guildname=" + guildname + "&guildtag=" + guildtag;
    evalpostAJAXHtml("createguild.php",data);
}

function loadGuild(){
    guildname = $("joinguildname").value;
    data = "guildname=" + guildname;
    evalpostAJAXHtml("loadguild.php",data);
}

function applyGuild(){
    guildname = $("joinguildname").value;
    data = "guildname=" + guildname;
    evalpostAJAXHtml("applyguild.php",data);
}

function donateGold(){
    amount = $("donateamount").value;
    data = "amount=" + amount;
    evalpostAJAXHtml("donategold.php",data);
}

function modifyRecruit(){
    data = "modify=recruit";
    evalpostAJAXHtml("modifyrecruit.php",data);
}

function modifyAccept(){
    data = "modify=accept";
    evalpostAJAXHtml("modifyrecruit.php",data);
}

function applicantAccept(username){
    data = "modify=applicant&username=" + username;
    evalpostAJAXHtml("modifyrecruit.php",data);
}

function applicantKick(username){
    data = "modify=kick&username=" + username;
    evalpostAJAXHtml("modifyrecruit.php",data);
}

function applicantPromote(username){
    data = "modify=promote&username=" + username;
    evalpostAJAXHtml("modifyrecruit.php",data);
}

function applicantDemote(username){
    data = "modify=demote&username=" + username;
    evalpostAJAXHtml("modifyrecruit.php",data);
}

function upgradeGuild(upgrade){
    data = "upgrade=" + upgrade;
    evalpostAJAXHtml("upgradeguild.php",data);
}

function modifyNews(){
    data = "modify=news";
    evalpostAJAXHtml("modifynews.php",data);
}

function leaveGuild(){
    data = "leave=guild";
    evalpostAJAXHtml("leaveguild.php",data);
}

function confirmLeave(decision){
    data = "decision=" + decision;
    evalpostAJAXHtml("leaveguild.php",data);
}

function setNews(){
    news = $("guildnews").value;
    data = "news=" + news;
    evalpostAJAXHtml("setnews.php",data);
}

function ViewPlayerStats(player){
    data = "name=" + player;
    evalpostAJAXHtml("viewtop.php",data);
}

function SearchPlayerStats(){
    player = $("name").value;
    data = "name=" + player;
    evalpostAJAXHtml("viewtop.php",data);
}

function buy(page){
    data = "page=" + page;
    evalpostAJAXHtml("viewshop.php",data);
}

function runTrainingCourse(Grabclass){
    fillDiv('displayArea','<center>Training in progress...</center>');
    data = "train=" + Grabclass;

    evalpostAJAXHtml("training.php",data);
}

function buyFromTrade(itemid){
    data = "buyingid=" + itemid;
    evalpostAJAXHtml("viewtrade.php",data);
}

function removeFromTrade(itemid){
    data = "removeid=" + itemid;
    evalpostAJAXHtml("viewtrade.php",data);
}

function trade(page){
    data = "page=" + page;
    evalpostAJAXHtml("viewtrade.php",data);
}

function putOnMarket(){
    Price = $("price").value;
    Item = $("item").value;
    fillDiv('displayArea','<center>Adding item to Market....</center>');
    data = "price=" + Price + "&item=" + Item;
    evalpostAJAXHtml("viewtrade.php",data);
}

function fightDemon(demonid){
    data = "demonid=" + demonid;
    evalpostAJAXHtml("attackdemon.php",data);
}

function castSpell(spellname){
    data = "spellname=" + spellname;
    evalpostAJAXHtml("castspell.php",data);
}

function castAffinity(charge){
    data = "charge=" + charge;
    evalpostAJAXHtml("castspell.php",data);
}

function learnDivination(name){
    data = "name=" + name;
    evalpostAJAXHtml("divination.php",data);
}
function move(direction){
	data = "direction=" + direction;
    evalpostAJAXHtml("move.php",data);
}