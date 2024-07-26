var a = 0;

function subtract(elementId){
    if (a > 0) {
        a = a - 1;
    }
    document.getElementById(elementId).value = a;
}

function add(elementId){
        
    a = a + 1;
    document.getElementById(elementId).value = a;
}

function eventHandler(text) {
    alert("Something " + text);
}