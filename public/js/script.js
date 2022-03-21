function quantityValidation() {
    var a = parseInt(document.getElementById('quantity').value);
    var b = document.getElementById('product_quantity').value;
    
    if(a > b) {
        document.getElementById('error').innerHTML = "Select quantity less than  "+b;
        quantity.style.backgroundColor = "#ffcccc";
        document.getElementById('button').style.visibility = 'hidden';
    }
    
    if(a < 1) {
        document.getElementById('error').innerHTML = "Select quantity more than 0.";
        quantity.style.backgroundColor = "#ffcccc";
        document.getElementById('button').style.visibility = 'hidden';
    }

    if(a>0 && a<=b) {
        document.getElementById('error').innerHTML = "";
        quantity.style.backgroundColor = "#ffffff";
        document.getElementById('button').style.visibility = 'visible';
    }
}

function categoryValidation() {
    var a = parseInt(document.getElementById('quantity').value);
    var b = document.getElementById('stock_quantity').value;
    
    if(a > b) {
        document.getElementById('error').innerHTML = "Select quantity less than  "+b;
        quantity.style.backgroundColor = "#ffcccc";
        document.getElementById('button').style.visibility = 'hidden';
    }
    
    if(a < 1) {
        document.getElementById('error').innerHTML = "Select quantity more than 0.";
        quantity.style.backgroundColor = "#ffcccc";
        document.getElementById('button').style.visibility = 'hidden';
    }

    if(a>0 && a<=b) {
        document.getElementById('error').innerHTML = "";
        quantity.style.backgroundColor = "#ffffff";
        document.getElementById('button').style.visibility = 'visible';
    }
}

