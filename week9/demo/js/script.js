
// XML HTTP Request
var xhr = new XMLHttpRequest();

xhr.onreadystatechange = function() { 
    if ( xhr.readyState === 4 && xhr.status === 200 ) {  
        callback();  
   } 
};  

var usernameField = document.querySelector('#username');
var usernameInfo = document.querySelector('.usernametaken');

usernameField.addEventListener('blur',makeAJAXCall);


function makeAJAXCall(){
       
    xhr.open('POST', 'usernametaken.php', true);
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.send('username='+usernameField.value);

}


function callback() {
        var response = JSON.parse(xhr.responseText);  

        usernameInfo.innerHTML = response.taken;
       
}

