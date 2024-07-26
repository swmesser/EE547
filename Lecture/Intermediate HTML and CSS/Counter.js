var a = 0;

function subtract(){
    if (a > 0) {
        a = a - 1;
    }
    document.getElementById('result').value = a;
}

function add(){
        
    a = a + 1;
    document.getElementById('result').value = a;
}

function eventHandler(text) {
    alert("Something " + text);
}