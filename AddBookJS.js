function showResult(page) {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
        }
    }
    SearchType = document.getElementById("SearchType");
    TypeValue = SearchType.options[SearchType.selectedIndex].value;
    ShowNum = document.getElementById("ShowNum");
    ShowValue = ShowNum.options[ShowNum.selectedIndex].value;
    SearchText = document.getElementById("SearchText").value;

    xmlhttp.open("GET", "AddBookUser.php?time="+ new Date().getTime()+"&show="+ShowValue+"&page="+page+"&type="+TypeValue+"&text="+SearchText, true);
    xmlhttp.send();
    return false;
}
    
function ShowMeDate() {
    var Today = new Date();
    alert("Today is " +Today.getDate() +  "/" + showMonth() +"/" +  Today.getFullYear());
}

function showMonth() {
    var month = new Array();
    month[0] = "January";
    month[1] = "February";
    month[2] = "March";
    month[3] = "April";
    month[4] = "May";
    month[5] = "June";
    month[6] = "July";
    month[7] = "August";
    month[8] = "September";
    month[9] = "October";
    month[10] = "November";
    month[11] = "December";

    var d = new Date();
    var n = month[d.getMonth()];
    return n;
}

 /** Change the style **/
 function overStyle(object){
    object.style.color = 'orange';
    // Change some other properties ...
 }

 /** Restores the style **/
 function outStyle(object){
    object.style.color = '#B2DFEE';
    // Restore the rest ...
 }

  /** Restores the style with white**/
 function outStylewhite(object){
    object.style.color = '#FFFFFF';
    // Restore the rest ...
 }
 
function CheckLength() {
    if (document.getElementById("NameHint").innerHTML != "" ) {
        alert("User Name non-compliance");
        return false;
    }
    if (document.getElementById("PasswordHint").innerHTML != "") {
        alert("Password non-compliance");
        return false;
    }
      if (document.getElementById("newPasswordHint").innerHTML != "") {
        alert("New Password non-compliance");
        return false;
    }
      if (document.getElementById("emailHint").innerHTML != "") {
        alert("Email non-compliance");
        return false;
    }
}

function NameCheck(str) {
    if (str.length <= 5) {
        document.getElementById("NameHint").innerHTML="Username's length must be more than 5";
        return;
    } 
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("NameHint").innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open("GET","AddBookCheckName.php?Name="+str, true);
    xmlhttp.send();
}

function IsNullName(str) {
    if (str.length > 0) {
        document.getElementById("NameHint").innerHTML="";
    } else {
        document.getElementById("NameHint").innerHTML="*"
    }
}

function IsNullNameSubmit() {
    if (document.getElementById("NameHint").innerHTML != "" ) {
        alert("Name non-compliance");
        return false;
    }
}

function RemoveNameHint() {
    document.getElementById("NameHint").innerHTML="";
}

function AddNameHint() {
    document.getElementById("NameHint").innerHTML="*";
}

function PasswordCheck(str) {
    if (str.length <=5) {
        document.getElementById("PasswordHint").innerHTML="Password's length must be more than 5";
    } else {
        document.getElementById("PasswordHint").innerHTML=""
    }
}

function newPasswordCheck(str) {
    if (str.length <=5) {
        document.getElementById("newPasswordHint").innerHTML="Password's length must be more than 5";
    } else {
        document.getElementById("newPasswordHint").innerHTML="";
    }
}
    
function RemoveData(id) {
    if(false == confirm("Are you sure you want to delete?")) {
        return false;
    }
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            if (xmlhttp.reponseXML == "Error"){
                alert("Error deleting record");
            } else {
                document.getElementById("row"+id).innerHTML="";
            }
        }
    }
    xmlhttp.open("GET","AddBookDel.php?id="+id, true);
    xmlhttp.send();
    return false;
}

function AddComment() {
    if (document.getElementById("Comment").value == "" ) {
        alert("Content can't be empty");
        return false;
    }
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("AddComment").disabled = false;
            if (xmlhttp.reponseXML == "Error"){
                alert("Add Comment Error");
            } else {
                alert("Add Comment Success");
                window.location.href="AddBookGB.php";
            }
        }
    }
    document.getElementById("AddComment").disabled = true;
    xmlhttp.open("GET","AddBookAddGB.php?Comment=" + document.getElementById("Comment").value, true);
    xmlhttp.send();
}

window.fbAsyncInit = function() {
    FB.init({
        appId      : '1199286423433114',
        xfbml      : true,
        version    : 'v2.5'
    });
};

(function(d, s, id){
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=1199286423433114";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function facebookLogin() //facebook login, will require permission to see the public profile (Default) and email
{
	var app_id = "1199286423433114";
//$canvas_page =  "http://apps.facebook.com/centaurus_app/";
	var canvas_page = "https://community.dur.ac.uk/tsung-hua.lee/AddBook/AddBookFB.php";

	var auth_url  = "https://www.facebook.com/dialog/oauth?client_id="; 
	auth_url +=  app_id + "&scope=email&redirect_uri=" + canvas_page;
	location.href = auth_url;
}

function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
}

  function checkForm(form)
  {
    if(!form.captcha.value.match(/^\d{5}$/)) {
      alert('Please enter the CAPTCHA digits in the box provided');
      form.captcha.focus();
      return false;
    }
    return true;
  }
  
