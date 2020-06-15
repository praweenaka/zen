function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
// Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}

function keyset(key, e) {

    if (e.keyCode == 13) {
        document.getElementById(key).focus();
    }
}

function got_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000066";
}

function lost_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000000";
}

 
 
 

function save_inv() {


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
 

    // if (document.getElementById('location_name').value == "") {
    //     document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Location Name Not Entered</span></div>";
    //     return false;
    // }
    document.getElementById('msg_box').innerHTML = "";

    var url = "order_data.php";
    url = url + "?Command=" + "save";
 
    url = url + "&des=" + document.getElementById('des').value; 
    url = url + "&cid=" + document.getElementById('cid').value; 
    url = url + "&spid=" + document.getElementById('spid').value;
    url = url + "&skid=" + document.getElementById('skid').value;  
    url = url + "&sdate=" + document.getElementById('sdate').value;  
 
    xmlHttp.onreadystatechange = re_save;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function re_save() {
    var XMLAddress1;
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
 
        if (xmlHttp.responseText == "Saved") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
            setTimeout("location.reload(true);", 500);
            // document.getElementById('location_name').value="";
            pass_data();
        } else {
            // document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }

}

function pass_data(selectStatus)
{

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "order_data.php";
    url = url + "?Command=" + "pass_data"; 
 
    url = url + "&selectStatus=" + selectStatus;

    xmlHttp.onreadystatechange = passcusresult_quot;

    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}

 function passcusresult_quot()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('ordertbl').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;


        self.close();
    }
}


function approve(id)
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
     
    var url = "order_data.php";
    url = url + "?Command=" + "approve"; 
    url = url + "&id=" + id;

    xmlHttp.onreadystatechange = passcusresult_quotapp;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
    

}

function passcusresult_quotapp()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
 
         pass_data('Approval');
         var x = document.getElementsByClassName("radiobtn");
         x[1].checked=true;
        self.close();
    }
}


function reject(id)
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
     
    var url = "order_data.php";
    url = url + "?Command=" + "reject"; 
    url = url + "&id=" + id;

    xmlHttp.onreadystatechange = passcusresult_quotpen;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
   

}




 
 function passcusresult_quotpen()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
 
         pass_data('Pending');


        self.close();
    }
}


function selectserpro()
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
     
    var url = "order_data.php";
    url = url + "?Command=" + "selectserpro"; 
    url = url + "&skid=" + document.getElementById('skid').value;

    xmlHttp.onreadystatechange = passcusresult_selectcom;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
   

}

function passcusresult_selectcom()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
 
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("combo");
        document.getElementById('dd').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;
 

        self.close();
    }
}