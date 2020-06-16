// JavaScript Document
function getXMLHTTPRequest() {  
    var req =  false;  

    try {   
        /* for Firefox */   
        req = new XMLHttpRequest();   
    } 
    catch (err) {   
        try {    
            /* for some versions of IE */    
            req = new ActiveXObject("Msxml2.XMLHTTP");   
        } 
        catch (err) { 
            try {     
                /* for some other versions of IE */     
                req = new ActiveXObject("Microsoft.XMLHTTP");    
            }
            catch (err) {     
                req = false;    
            }   
        }  
    }  
    return req; 
}

function set_sub_kategori(kategori){ 
    var xmlhttp = getXMLHTTPRequest();    
    var url = "set_sub_kategori.php?kategori=" + kategori;  
    var inner = "subkat";  

    //open request  
    xmlhttp.open('GET', url, true);     
    xmlhttp.onreadystatechange = function() {   
        document.getElementById(inner).innerHTML = '<img src="images/ajax_loader.png"/>';   
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
            document.getElementById(inner).innerHTML = xmlhttp.responseText;         
        }         
        return false;     
    }     
    xmlhttp.send(null); 
}