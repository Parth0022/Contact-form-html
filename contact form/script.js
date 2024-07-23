const form = document.getElementById('contact-form');
const toastContainer = document.querySelector('.toast-container');

form.addEventListener('submit', function(e) {
  e.preventDefault();

  // Simulate form submission with a delay
  fetch('submit.php', {
    method: 'POST',
    body: new FormData(form)
  })
  .then(response => {
    if (response.ok) {
      return response.text();
    } else {
      throw new Error('Something went wrong!');
    }
  })
  .then(data => {
    showToast('Success! Your message has been sent.', 'success');
  })
  .catch(error => {
    showToast('Error! Something went wrong.', 'error');
  });
});

function showToast(message, type) {
  const toast = document.createElement('div');
  toast.classList.add('toast', type);
  toast.textContent = message;
  toastContainer.appendChild(toast);

  // Hide the toast after a few seconds
  setTimeout(() => {
    toast.remove();
  }, 3000);
}
