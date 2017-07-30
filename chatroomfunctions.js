function readChatroom(){

	data = "chatAction=Read Chatroom";

	evalpostAJAXHtml("readchatroom.php",data);

	setTimeout("readChatroom();", 2500);

}



function readChatroom2(){

	data = "chatAction=Read Chatroom";

	evalpostAJAXHtml("readchatroom.php",data);

}



function sendMessage(){

	chatMessage = $("chatmessage").value;

	chatMessage = chatMessage.replace(/\+/g, "[plus]");

	chatMessage = chatMessage.replace(/\&/g, "[amp]");

	chatMessage = chatMessage.replace(/\%ED/gi, "\% ED");

	$("chatmessage").value = "";

	data = "chatMessage=" + chatMessage;

	evalpostAJAXHtml("sendmessage.php",data);

}



function toptell(cName){

	document.ajaxchat.messagechat.focus();

	if (document.ajaxchat.messagechat.value == "") 

	{

		document.ajaxchat.messagechat.value = "/m " + cName + ": ";

		document.ajaxchat.messagechat.focus();

	} 

	else if (document.ajaxchat.messagechat.value == "/m " + cName + ": ") 

	{

		document.ajaxchat.messagechat.value = "/id " + cName;

		document.ajaxchat.messagechat.focus();

	}

	else

	{

		document.ajaxchat.messagechat.value = "/m " + cName + ": ";

		document.ajaxchat.messagechat.focus();

	}

}



function answerq(cName){

	document.ajaxchat.messagechat.focus();

	document.ajaxchat.messagechat.value = "/a " + cName + ": ";

	document.ajaxchat.messagechat.focus();

}



function modchat(cName){

	document.ajaxchat.messagechat.focus();

	document.ajaxchat.messagechat.value = "/mod ";

	document.ajaxchat.messagechat.focus();

}



function checkIP(cName){

	document.ajaxchat.messagechat.focus();

	document.ajaxchat.messagechat.value = "/ip " + cName;

	document.ajaxchat.messagechat.focus();

}



function chatColour(colourID){

	data = "colourID=" + colourID;

	evalpostAJAXHtml("chatcolour.php",data);

}