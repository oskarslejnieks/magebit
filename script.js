const validateEmail = (email) => {
    return email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
};
const validateCOemail = (coEmail) => {
    return coEmail.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+(co)))$/)
}

function validateForm() {
    let email = document.forms["emailForm"]["emailInput"].value;

    let errorText;

    let checkboxForm = document.getElementById('checkboxForm');
    let checkbox = document.getElementById('checkTerms');
    let emailInput = document.getElementById('emailInput');
    let arrow = document.getElementById('arrowSpan');


    const redBorder = emailInput.style.border = '1px solid red';
    const redLeftBorder = emailInput.style.borderLeft = '4px solid red';
    let errorBorder = redBorder + redLeftBorder;

    let headingOne;
    let paragraphOne;
    
    display_image('images/cup.png', 100, 100);
    if (email == "") {

        headingOne = "Subscribe to newsletter";
        paragraphOne = "Subscribe to our newsletter and get 10% discount on pineapple glasses.";
        errorText = "Email address is required";
        errorBorder;
        
    }
    else if(!validateEmail(email)) {
        headingOne = "Subscribe to newsletter";
        paragraphOne = "Subscribe to our newsletter and get 10% discount on pineapple glasses.";
        errorText = "Please, provide a valid email!" ;
        errorBorder;
    }
    else if(!checkbox.checked) {
        headingOne = "Subscribe to newsletter";
        paragraphOne = "Subscribe to our newsletter and get 10% discount on pineapple glasses.";
        errorText = "You must accept the terms and conditions";
        errorBorder;
    }
    else if(validateCOemail(email)) {
        headingOne = "Subscribe to newsletter";
        paragraphOne = "Subscribe to our newsletter and get 10% discount on pineapple glasses.";
        errorText = "We are not accepting subscriptions from Colombia emails";
        errorBorder;
    }
    else {
        checkboxForm.style.display = "none";
        checkboxForm.style.margin = "0";
        emailInput.style.display = "none";
        errorText = "";
        headingOne = "Thanks for subscribing!";
        paragraphOne = "You have successfully subscribed to our email listing. Check your email for the discount code.";
        arrow.style.display = "none";
        document.getElementById('img').style.display= 'block';
    }
    
    document.getElementById("errorOutput").innerHTML = errorText;

    document.getElementById('img').innerHTML = img;
    document.getElementById("heading1").innerHTML = headingOne;
    document.getElementById("paragraph1").innerHTML = paragraphOne;

    

    return errorText;
    
  }

  function display_image(src, width, height) {
    var a = document.createElement("img");
    a.src = src;
    a.width = width;
    a.height = height;

    document.body.appendChild(a);
  }