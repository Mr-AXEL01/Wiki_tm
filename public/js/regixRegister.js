
document.getElementById('Fname').addEventListener('input', function() {
    const FnameValue = this.value;
    const FnameStyle = this;
    const regexFname = /^[A-Za-z\s-]+$/;

  
    FnameStyle.classList.remove( 'border-red-300', 'border-green-300');
  
    if (!regexFname.test(FnameValue)) {
        FnameStyle.classList.add('border-red-300');
      showError('errorMessage');
      
    } else {
        FnameStyle.classList.add('border-green-300');
      hideError('errorMessage');
    }
  });

  document.getElementById('email').addEventListener('input', function() {
    const emailValue = this.value;
    const emailStyle = this;
    const regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/;
  
    emailStyle.classList.remove('border-red-300', 'border-green-300');
  
    if (!regexEmail.test(emailValue)) {
        emailStyle.classList.add('border-red-300');
      showError('errormessage1');
    } else {
        emailStyle.classList.add('border-green-300');
      hideError('errormessage1');
    }
  });




  function showError(errorId) {
    const errorElement = document.getElementById(errorId);
    errorElement.classList.remove('hidden');
    errorElement.classList.add('block');

  }
  
  function hideError(errorId) {
    const errorElement = document.getElementById(errorId);
    errorElement.classList.add('hidden');
  }