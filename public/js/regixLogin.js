document.getElementById('emailLogin').addEventListener('input', function() {
    const LgemailValue = this.value;
    const LgemailStyle = this;
    const regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/;
  
    LgemailStyle.classList.remove('border-red-300', 'border-green-300');
  
    if (!regexEmail.test(LgemailValue)) {
        LgemailStyle.classList.add('border-red-300');
      showError('errormessage2');
    } else {
        LgemailStyle.classList.add('border-green-300');
      hideError('errormessage2');
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