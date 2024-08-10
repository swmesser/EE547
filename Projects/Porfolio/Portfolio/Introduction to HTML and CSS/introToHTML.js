function showButton(elementId, buttonId){
    let element = document.getElementById(elementId);
    let button = document.getElementById(buttonId);

    if ( element.style.display == "block" ) {
        element.style.display = "none";
        button.style.marginBottom = 5 + 'px';
    } else {
        element.style.display = "block";
        button.style.marginBottom = 0 + 'px';
        

    }
}