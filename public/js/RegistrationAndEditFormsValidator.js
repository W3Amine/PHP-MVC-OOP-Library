const errorCollection = [];
alertbox.style.display = "none";
FormSubmit.onclick = function (e) {
  errorCollection.length = 0;
  alertbox.style.display = "none";
  alertbox.innerHTML = "";
  let Nickname = document.getElementById("Nickname").value;
  let Full_Name = document.getElementById("Full_Name").value;
  let Email = document.getElementById("Email").value;
  let Password = document.getElementById("Password").value;
  let ConfirmPassword = document.getElementById("ConfirmPassword").value;
  let Address = document.getElementById("Address").value;
  let Phone = document.getElementById("Phone").value;
  let Birth_Date = document.getElementById("Birth_Date").value;
  let CIN = document.getElementById("CIN").value;
  let Occupation = document.getElementById("Occupation").value;
  if (document.getElementById("TermsofUse") != null) {
    TermsofUse = document.getElementById("TermsofUse").checked;
  }
  let myRegex = /^[a-zA-Z-\s]+$/;
  let emailtest = /(\w{1,})[@](\w{1,})[.](\w{1,})/;
  e.preventDefault();
  if (Nickname.length === 0) {
    errorCollection.push("the Nickname is required , can't be empty ");
  } else if (Nickname.length > 50) {
    errorCollection.push("the max length for the Nickname is 50 ");
  } else if (myRegex.test(Nickname) === false) {
    errorCollection.push("the first name can't contain numbers");
  }
  if (Full_Name.length === 0) {
    errorCollection.push("the Full_Name is required , can't be empty ");
  } else if (Full_Name.length > 50) {
    errorCollection.push("the max length for the Full_Name is 50 ");
  } else if (myRegex.test(Full_Name) === false) {
    errorCollection.push("the Full Name can't contain numbers");
  }
  if (Email.length === 0) {
    errorCollection.push("the email is required , can't be empty");
  } else if (emailtest.test(Email) === false) {
    errorCollection.push("please enter a valid email ");
  }
  if (Phone.length === 0) {
    errorCollection.push("the Phone number is required , can't be empty");
  }
  if (Password.length === 0) {
    errorCollection.push("the Password is required , can't be empty");
  }
  if (ConfirmPassword.length === 0) {
    errorCollection.push("Please Confirm The Password , can't be empty");
  }
  if (ConfirmPassword !== Password) {
    errorCollection.push("the passwords does not match");
  }
  if (CIN.length === 0) {
    errorCollection.push("Please The CIN , can't be empty");
  }
  if (Birth_Date.length === 0) {
    errorCollection.push("Please The Birth Date , can't be empty");
  }
  if (document.getElementById("TermsofUse") != null) {
    if (TermsofUse === false) {
      errorCollection.push("Please Agree to terms ");
    }
  }
  if (Occupation.length === 0) {
    errorCollection.push("Please choose the Occupation ");
  }
  if (Address.length === 0) {
    errorCollection.push("Please fill the Address ");
  }
  if (errorCollection.length > 0) {
    for (let i = 0; i < errorCollection.length; i++) {
      alertbox.style.display = "block";
      alertbox.innerHTML +=
        "<strong> error ! </strong>" + errorCollection[i] + "<br>";
    }
  } else {
    Form.submit();
  }
};
