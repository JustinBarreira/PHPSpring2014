
// XML HTTP Request
var xhr = new XMLHttpRequest();

xhr.onreadystatechange = function() { 
    if ( xhr.readyState === 4 && xhr.status === 200 ) {  
        callback();  
   } 
};  

var websiteField = document.querySelector('#website');
var websiteInfo = document.querySelector('.websitetaken');

websiteField.addEventListener('blur',makeAJAXCall);


function makeAJAXCall(){
       
    xhr.open('POST', 'websitetaken.php', true);
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.send('website='+websiteField.value);

}


function callback() {
        var response = JSON.parse(xhr.responseText);  

        websiteInfo.innerHTML = response.taken;
       
}

